<?php
/**
 * Bitrix24 integtration that adds leads from
 * various contact form plugins.
 */
class Bitrix24 {

    private $webhook;

    public function __construct( $webhook ) {

        $this->webhook = $webhook;

        add_action( 'wpcf7_mail_sent', array($this, 'cf7') );
        add_action( 'formcraft_after_save', array($this, 'formcraft3'), 10, 4 );

    }

    /**
     * Parse phone number.
     * 
     * @param mixed $phone
     * @return array
     */
    private function parse_phone( $phone ) {

        if ( ! is_array($phone) ) {
            $phone = array( $phone );
        }

        $phones = array();

        for ( $i = 0; $i < count($phone); $i++ ) {
            $phones["n$i"] = array(
                'VALUE'      => $phone[$i],
                'VALUE_TYPE' => 'MOBILE'
            );
        }

        return $phones;

    }

    /**
     * Parse email.
     * 
     * @param mixed $email
     * @return array
     */
    private function parse_email( $email ) {

        if ( ! is_array($email) ) {
            $email = array( $email );
        }

        $emails = array();

        for ( $i = 0; $i < count($email); $i++ ) {
            $emails["n$i"] = array(
                'VALUE'      => $email[$i],
                'VALUE_TYPE' => 'HOME',
            );
        }

        return $emails;

    }

    /**
     * Add lead from Contact Form 7 (CF7).
     */
    public function cf7( $form ) {

        $submission = WPCF7_Submission::get_instance();

        if ( $submission ) {
            $formdata = $submission->get_posted_data();

            // Fields for adding lead.
            $fields = array(
                'TITLE' => 'Contact Form ( ' . home_url() . ' )'
            );

            if ( isset( $formdata['module-title'] ) ) {
                $fields['TITLE'] = $formdata['module-title'] . ' ( ' . $formdata['page-link'] . ' )';
            }

            if ( isset( $formdata['checkbox-404'] ) ) {
                $fields['TITLE'] = $formdata['your-name'] . ' - ' . $formdata['checkbox-404'][0] . ' ( ' . home_url() . ' )';
            }


            if ( isset($formdata['your-name']) ) {
                $fields['NAME'] = trim( $formdata['your-name'] );
            } elseif ( isset($formdata['your-email']) ) {
                $fields['NAME'] = trim( $formdata['your-email'] );
            }

            if ( isset($formdata['your-email']) ) {
                $fields['EMAIL'] = $this->parse_email( $formdata['your-email'] );
            }

            if ( isset($formdata['your-phone']) ) {
                $fields['PHONE'] = $this->parse_phone( $formdata['your-phone'] );
            }

            if ( isset($formdata['your-message']) ) {
                $fields['COMMENTS'] = trim( $formdata['your-message'] );
            }

            $this->send( $fields );
        }

    }

    /**
     * Add lead from FormCraft3.
     */
    public function formcraft3( $content, $meta, $raw_content, $integrations ) {

        $labels = array(
            'name'    => array( 'Name', 'Nimi', 'Имя', 'Название фирмы', 'Company name', 'Firma nimi' ),
            'email'   => array( 'E-mail', 'E-post', 'E-mail address', 'Email' ),
            'phone'   => array( 'Phone', 'Telefoninumber', 'Телефон', 'Telefon', 'Phone number' ),
            'comment' => array( 'Request message', 'Päringu tekst', 'Комментарий', 'Your comment', 'Sõnum', 'Текст запроса', 'Message', 'Kommentaar', 'Comment' )
        );

        $fields = array(
            'TITLE' => $content['Form Name'] . ' ( ' . home_url() . ' )'
        );
    
        foreach ( $raw_content as $input ) {
            if ( in_array( $input['label'], $labels['name'] ) ) {
                $fields['NAME'] = $input['value'];
            } elseif ( in_array( $input['label'], $labels['email'] ) ) {
                $fields['EMAIL'] = $this->parse_email( $input['value'] );
            } elseif ( in_array( $input['label'], $labels['phone'] ) ) {
                $fields['PHONE'] = $this->parse_phone( $input['value'] );
            } elseif ( in_array( $input['label'], $labels['comment'] ) ) {
                $fields['COMMENTS'] = $input['value'];
            }
        }

        $this->send( $fields );
    }

    /**
     * Send data to Bitrix24.
     * 
     * @param array $fields
     */
    private function send( $fields ) {

        $data = http_build_query( array(
            'fields' => $fields,
            'params' => ['REGISTER_SONET_EVENT' => 'N']
        ) );

        $curl = curl_init();

        curl_setopt_array( $curl, array(
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_POST           => 1,
            CURLOPT_HEADER         => 0,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL            => $this->webhook,
            CURLOPT_POSTFIELDS     => $data,
        ) );

        $result = curl_exec( $curl );
        curl_close( $curl );
        $result = json_decode( $result, 1 );

        if ( array_key_exists('error', $result) ) {
            return array(
                'status' => 'error',
                'text'   => $result[ 'error_description' ]
            );
        } else {
            return array(
                'status' => 'ok'
            );
        }

    }

}