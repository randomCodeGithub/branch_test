<?php
$section->addText( 'CSC MOBILE TELEKOMMUNIKATSIOONITEENUSE LEPING NR ' . $info['contract_number'], 'f_bold', 'p_center' );
$section->addText( 'Tallin, ' . date( 'd.m.Y' ), '', 'p_center_margin' );

// 1.
$section->addListItem( 'Lepingupooled', 0, 'f_bold', 'multilevel', 'p_center' );
$section->addListItem( 'Käesolev mobiiltelefonivõrgu (roaming) kaudu tagatava telekommunikatsiooniteenuse osutamise leping (edaspidi Leping) sõlmiti CSC Telecom Estonia OÜ (edaspidi CSC TELECOM) ja ' . $info['name'] . ' (edaspidi KLIENT) vahel.', 1, '', 'multilevel', 'p_justify' );
$section->addListItem( 'CSC TELECOMILE ja KLIENDILE viidatakse käesolevas lepingus eraldi kui Poolele ja ühiselt kui Pooltele.', 1, '', 'multilevel', 'p_justify_margin' );

// 2.
$section->addListItem( 'Lepingu objekt', 0, 'f_bold', 'multilevel', 'p_center' );
$section->addListItem( 'Vastavalt lepingu (ja selle lisade) tingimustele, CSC TELECOM’I telefonivõrgu kaudu telekommunikatsiooniteenuste osutamise ja Eesti Vabariigis teenuste osutamise perioodil kohaldatavate õigusaktide nõuetele, kohustub CSC TELECOM pakkuma KLIENDILE tellitud telekommunikatsiooniteenuseid (edaspidi Teenused), ning KLIENT kohustub kasutama Teenuseid ja tasuma nende eest vastavalt Lepingus sätestatud tingimustele. ', 1, '', 'multilevel', 'p_justify' );
$section->addListItem( 'KLIENDI Lepingu sõlmimise ajal tuuakse käesoleva Lepingu Lisas 1 välja tellitud Teenuste nimekiri, mobiiltelefoni number (või numbrid) ning muud Teenuste osutamise eritingimused.', 1, '', 'multilevel', 'p_justify_margin' );

// 3.
$section->addListItem( 'Hind ja Teenuste eest tasumine', 0, 'f_bold', 'multilevel', 'p_center' );
$section->addListItem( 'Pooled lepivad kokku, et tasu Teenuste eest arvestatakse vastavalt  käesoleva Lepingu Lisades 2.1. ja 2.2. näidatud Põhiteenuste hinnakirjadele.', 1, '', 'multilevel', 'p_justify' );
$section->addListItem( 'Klient tasub CSC Telecom Estonia-le Teenuse eest CSC TELECOM Estonia poolt esitatava arve alusel järgmise kuu 20-ks kuupäevaks. CSC TELECOM esitab arve üks kord kalendrikuus järgneva kuu seitsmendaks kalendripäevaks. Arve saadetakse e-posti teel Kliendi e-posti aadressile. Arve mittesaamisel 10-ks kuupäevaks on klient kohustatud informeerida sellest CSC TELECOM. Arve loetakse õigeaegselt tasutuks, kui makse on CSC TELECOM  arvelduskontole laekunud arvel näidatud kuupäevaks. Teenuste eest tasu arvestamisel lähtutakse Kliendile osutatud teenuste mahust.', 1, '', 'multilevel', 'p_justify' );
$section->addListItem( 'Kõik teated ja muu sidepidamine, mis on vajalik või lubatud käesoleva lepingu alusel, peab olema kirjalikus vormis või kirjalikku taasesitust võimaldavas vormingus (e-kiri), kui käesolevas lepingus ei ole sätestatud teisiti. Kõik teated loetakse jõustunuks alates nende kättesaamisest. E-kirjaga saadetud teade loetakse teisele poolele kätte toimetatuks, kui selle saatmisest on möödunud 2 (kaks) tööpäeva. CSC TELECOM peab informeerima KLIENTI teenuste mistahes hinna muudatustest (sh. teenuste esitamise tariifide muudatustest) kui tariifide muudatus teeb KLIENDI olukorra halvemaks e-kirjaga 30 päeva ette. Kui KLIENT ei informeeri CSC TELECOM’i e-kirjaga Lepingu lõpetamisest käivitunud protsessis ning tegelikkuses kasutab Teenuseid kuni uute tariifide jõustumise hetkeni, siis arvestatakse, et KLIENT on muutunud tingimustega nõustunud ja neid aktsepteerinud.', 1, '', 'multilevel', 'p_justify' );
$section->addListItem( 'Lepingu Lisade hinnakirjades mittesisalduvate lisateenuste eest võetakse tasu vastavalt tariifidele, mis on CSC TELECOMI poolt avalikult deklareeritud (www.csc.ee, klienditugi ja muud vahendid).', 1, '', 'multilevel', 'p_justify' );
$section->addListItem( 'KLIENT tasub CSC TELECOM’ILE osutatud Teenuste eest vastavalt Lepingus toodud korrale.', 1, '', 'multilevel', 'p_justify_margin' );

// 4.
$section->addListItem( 'Poolte õigused ja kohustused', 0, 'f_bold', 'multilevel', 'p_center' );
$section->addListItem( 'KLIENT kinnitab, et tal on kõik vajalikud load Teenuse vastuvõtmiseks Teenuse osutamise kohas, nagu see on näidatud Lepingu Lisades, ning kohustub omaenda kulul tagama, et Lepingu kehtivuse ajal ei ole CSC TELECOMI jaoks koormavaid tegureid (keelde) tehniliste võimaluste rakendamiseks Teenuste osutamiseks KLIENDI poolt Teenuste osutamiseks valitud Teenuste osutamise kohas. See tingimus on põhitingimus CSC TELECOMI teenuste osutamiseks.', 1, '', 'multilevel', 'p_justify' );
$section->addListItem( 'Pooled kohustuvad täitma vastava Poole kohustusi, mis on esitatud Lepingus ja selle Lisades', 1, '', 'multilevel', 'p_justify' );
$section->addListItem( 'Pooled vastutavad Lepingus esitatud kohustuste mittetäitmise eest vastavalt Lepingus ja selle Lisades toodud korrale.', 1, '', 'multilevel', 'p_justify' );
$section->addListItem( 'Kui Teenuste osutamine katkeb (CSC TELECOMI võrgu telekommunikatsioon on saanud kahjustada, osutatav teenus on halva kvaliteediga vms), peab Klient teavitama CSC TELECOMI eksisteerivatest katkestustest. Teateid pakutavate Teenuste katkestustest võetakse vastu telefonil +3726109099. CSC TELECOM abijaam – klienditugi@csc.ee.', 1, '', 'multilevel', 'p_justify' );
$section->addListItem( 'CSC TELECOM kõrvaldab CSC TELECOM’I seadmete riketega seonduvad pakutavate Teenuste katkestused tööajal hiljemalt 4 (nelja) tunni jooksul ning töövälisel ajal 12 (kaksteist) tunni jooksul alates teate kättesaamise hetkest eksisteerivate katkestuste või rikete kohta.', 1, '', 'multilevel', 'p_justify' );
$section->addListItem( 'CSC TELECOM kõrvaldab internetiteenuse tagamise katkestused hiljemalt 2 tunni jooksul tööajal ning 12 (kaksteist) tunni jooksul töövälisel ajal alates teate kättesaamise hetkest eksisteerivate katkestuste või rikete kohta.', 1, '', 'multilevel', 'p_justify' );
$section->addListItem( 'Käesoleva Lepingu teenuse osutamist reguleerib Tehnilise Järelevalve Amet vastavalt Eesti Elektroonilise side seadusele.', 1, '', 'multilevel', 'p_justify_margin' );

// 5.
$section->addListItem( 'Lepingu kehtivus', 0, 'f_bold', 'multilevel', 'p_center' );
$section->addListItem( 'Käesolev Leping jõustub selle allakirjutamise hetkest mõlema Poole esindajate poolt ning on tähtajatu, kui Pooled pole teisiti kokku leppinud.', 1, '', 'multilevel', 'p_justify' );
$section->addListItem( 'Kui Pooled lepivad kokku, et Leping on tähtajaline, kuid üks Pooltest jätab teise Poole informeerimata kavatsusest Lepingut mitte pikendada kuni 30 (kolmkümmend) päeva enne Lepingu lõppemist, siis loetakse Leping pärast lõppemist tähtajatuks.', 1, '', 'multilevel', 'p_justify' );
$section->addListItem( 'Käesolev Leping reguleerib Poolte vahelisi suhteid, mis leiavad aset Teenuste osutamisel CSC TELECOM’I poolt ja nende kasutamisel KLIEND’I poolt vastavalt käesolevas Lepingus sätestatule, ning Teenuste puhul, mille osas Pooled lepivad kokku pärast käesoleva lepingu allakirjutamist.', 1, '', 'multilevel', 'p_justify' );
$section->addListItem( 'Kui KLIENT sõlmib vastavate Teenuste pakkumise tingimuste osas kaks või enam dokumenti, siis reguleerivad Poolte vahelisi suhteid hiljutisema dokumendi sätted, kui Pooled pole kokku leppinud teisiti.', 1, '', 'multilevel', 'p_justify' );
$section->addListItem( 'Kui mõni selle Lepingu tingimus või selle osa tunnistatakse õigusaktidega kehtestatud protsessis kehtetuks või kohaldamatuks, siis jäävad Lepingu ülejäänud sätted jõusse.', 1, '', 'multilevel', 'p_justify' );

// 6.
$section->addListItem( 'Lõppsätted', 0, 'f_bold', 'multilevel', 'p_center' );
$section->addListItem( 'Lepingule alla kirjutamisega (kui Lepingu Lisades pole näidatud teisiti) nõustub KLIENT sellega, et tema andmeid kasutatakse otseturunduse eesmärkidel (sh informatiivsete sõnumite saatmine, KLIENDI informeerimine kaupadest/teenustest, tema arvamuse küsimine kaupade/teenuste kohta ning kasutades sellel eesmärgil KLIEND’I isikuandmeid, sh e-posti) ning tema andmed lisatakse CSC TELECOMI KLIENTIDE nimekirja. KLIENT kinnitab, et talle tutvustati õigust mitte nõustuda sellega, et tema andmeid kasutatakse otseturunduse eesmärgil. KLIENDIL on õigus tühistada nõusolek täielikult või osaliselt, informeerides CSC TELECOMI sellest kirjalikult.', 1, '', 'multilevel', 'p_justify' );
$section->addListItem( 'Kõik käesoleva Lepingu Lisad on käesoleva Lepingu lahutamatud osad ning kehtivad kogu Lepingu kehtivusaja jooksul, välja arvatud vastavas Lisas osutatud erandid.', 1, '', 'multilevel', 'p_justify' );
$section->addListItem( 'CSC MOBILE TELEKOMMUNIKATSIOONITEENUSE LEPING on kliendisuhte raamleping, mis loob KlIENDILE võimaluse lihtsal viisil liituda CSC TELECOM teenustega, kasutada e-Keskkondi, osta kaupu ja teenuseid. CSC TELECOM osutab KLIENDILE Teenuseid tingimustel, mis on toodud Üldtingimustes, Hinnakirjas ning käesolevas Lepingus. CSC TELECOM viitab Tingimustele KLIENDILE Teenuse või kauba pakkumisel või Kliendiga Lepingu sõlmimisel ning võimaldab KLIENDIL Tingimustega tutvuda. Üldtingimused on Telekommunikatsiooniteenuse Lepingu  lahutamatu osa ja Pooled kohustuvad neid järgima.', 1, '', 'multilevel', 'p_justify' );
$section->addListItem( 'CSC TELECOM edastab teated KLIENDILE e-posti teel, e-teeninduse kaudu ning informatiivsed teated (sealhulgas Üldtingimuste muutmise kohta) kodulehel aadressil  https://csc.ee/et/.', 1, '', 'multilevel', 'p_justify' );
$section->addListItem( 'Käesolev Leping sõlmitakse kahes võrdset õiguslikku jõudu omavas eksemplaris; mõlemad Lepingu Pooled saavad ühe eksemplari.', 1, '', 'multilevel', 'p_justify' );

$section->addPageBreak();

// 7.
$section->addListItem( 'Poolte kontaktid ja allkirjad', 0, 'f_bold', 'multilevel', 'p_center' );
$section->addListItem( 'KLIENDI kontaktandmed:', 1, '', 'multilevel', 'p_justify' );
$section->addText( '', '', 'p_justify' );

$table = $section->addTable( [
    'width'            => \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 16.03 ),
    'borderColor'      => '000000',
    'borderSize'       => 6,
    'indent'           => new \PhpOffice\PhpWord\ComplexType\TblWidth( \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 1.46 ) ),
    'cellMarginTop'    => \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 0.14 ),
    'cellMarginBottom' => \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 0.14 ),
    'cellMarginLeft'   => \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 0.14 ),
    'cellMarginRight'  => \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 0.14 )
] );

$table->addRow();

$cell = $table->addCell( \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 8.62 ) );
$cell->addText( 'CSC TELECOM', 'f_bold', 'p_left' );

$cell = $table->addCell( \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 7.41 ) );
$cell->addText( 'Klient', 'f_bold', 'p_left' );

$table->addRow();

$cell = $table->addCell( \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 8.62 ) );
$cell->addText( 'CSC TELECOM ESTONIA OÜ', 'f_bold', 'p_left' );
$cell->addText( 'Aadress: Väike-Paala tn 1, Tallinn, 11415', '', 'p_left' );
$cell->addText( 'Registrikood: 14422354', '', 'p_left' );
$cell->addText( 'VAT number: EE102050660', '', 'p_left' );
$cell->addText( 'IBAN: EE242200221069121819', '', 'p_left' );
$cell->addText( 'SWIFT: HABAEE2X', '', 'p_left' );
$cell->addText( 'Panga nimi ja aadress: Swedbank AS, Liivalaia 8,', '', 'p_left' );
$cell->addText( '15040 Tallinn', '', 'p_left' );
$cell->addText( 'Tel: +3726109000', '', 'p_left' );
$cell->addText( 'E-post: info@csc.ee', '', 'p_left' );
$cell->addText( '', '', 'p_left' );
$cell->addText( $info['rep_name'], 'f_bold', 'p_left' );
$cell->addText( $info['rep_position'], '', 'p_left' );

$cell = $table->addCell( \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 7.41 ) );
$cell->addText( 'Klient: ' . $info['name'], 'f_bold', 'p_left' );
$cell->addText( 'Aadress: ' . $info['address'], '', 'p_left' );
$cell->addText( 'Isikukood: ' . $info['pers_code'], '', 'p_left' );
$cell->addText( 'Kontaktelefon: ' . $info['phone'], '', 'p_left' );
$cell->addText( 'E-post: ' . $info['email'], '', 'p_left' );
$cell->addText( 'Viitenumber: ' . $info['reference_number'], '', 'p_left' );
$cell->addText( '', '', 'p_left' );
$cell->addText( '', '', 'p_left' );
$cell->addText( '', '', 'p_left' );
$cell->addText( '', '', 'p_left' );
$cell->addText( '', '', 'p_left' );
$cell->addText( $info['name'], 'f_bold', 'p_left' );
$cell->addText( $info['position'], '', 'p_left' );

$section->addPageBreak();

// Client page
$textrun = $section->createTextRun( 'p_center' );
$textrun->addText( 'LISA 1 ', '', 'p_center' );
$textrun->addText( 'TELEKOMMUNIKATSIOONITEENUSE LEPINGULE NR ' . $info['contract_number'], 'f_bold', 'p_center' );

$section->addText( 'TEENUSTE NIMEKIRI', '', 'p_center' );
$section->addText( 'Tallinn, ' . date( 'd.m.Y' ), '', 'p_center' );
$section->addText( '' );

$textrun = $section->createTextRun( 'p_justify' );
$textrun->addText( 'CSC TELECOM ESTONIA OÜ ', 'f_bold', 'p_justify' );
$textrun->addText( '(CSC TELECOM), keda esindab direktor Sergei Buzak, kes tegutseb põhikirja alusel, ja', '', 'p_justify' );

$textrun = $section->createTextRun( 'p_justify' );
$textrun->addText( $info['name'], 'f_bold', 'p_justify' );
$textrun->addText( ' (KLIENT) ', '', 'p_justify' );
// $textrun->addText( $info['name'], 'f_bold', 'p_justify' );
$textrun->addText( ', on sõlminud käesoleva Lisa Nr 1 Telekommunikatsiooniteenuse Lepingule Nr. (edaspidi Leping)', '', 'p_justify' );

$section->addListItem( 'Lepingu kehtivuse aeg (Teenuste kasutamise miinimumperiood): ', 0, '', 'multilevel-2', 'p_justify' );

$table = $section->addTable( [
    'width'            => \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 7.56 ),
    'borderColor'      => '000000',
    'borderSize'       => 6,
    'indent'           => new \PhpOffice\PhpWord\ComplexType\TblWidth( \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 0.83 ) ),
    'cellMarginTop'    => \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 0.14 ),
    'cellMarginBottom' => \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 0.14 ),
    'cellMarginLeft'   => \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 0.14 ),
    'cellMarginRight'  => \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 0.14 )
] );

$table->addRow();

$cell = $table->addCell( \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 7.56 ) );
$textrun = $cell->createTextRun( 'p_justify' );
$textrun->addFormField('checkbox')->setValue('<w:sym w:font="Wingdings" w:char="F0FE"/>');

if ( $info['contract_type'] == 'fixed' ) {
    $textrun->addText( ' Tähtajaline', 'f_bold' );
    $textrun->addText( '. Lepingu kehtivuse aeg (Teenuste kasutamise miinimumperiood) on ' );
    $textrun->addText( $info['contract_term'], 'f_bold' );
    $textrun->addText( ' kuud alates Teenuste osutamise algusest.' );
} else {
    $textrun->addText( ' Tähtajatu', 'f_bold' );
    $textrun->addText( 'Lepingu kehtivuse aega (Teenuste kasutamise miinimumperioodi) ei määrata.' );
}

$section->addText( '' );

$listrun = $section->addListItemRun( 0, 'multilevel-2' );
$listrun->addText( 'Teenuste osutamise alguskuupäev: ' );
$listrun->addText( date( 'd.m.Y' ), 'f_bold' );

$section->addListItem( 'KLIENDILE tagatud telefoninumbrid:', 0, '', 'multilevel-2', 'p_justify' );

$table = $section->addTable( [
    'width'            => \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 16.92 ),
    'borderColor'      => '000000',
    'borderSize'       => 6,
    'indent'           => new \PhpOffice\PhpWord\ComplexType\TblWidth( \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 0.83 ) ),
    'cellMarginTop'    => \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 0.14 ),
    'cellMarginBottom' => \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 0.14 ),
    'cellMarginLeft'   => \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 0.14 ),
    'cellMarginRight'  => \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 0.14 )
] );

$table->addRow();

$cell = $table->addCell( \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 0.75 ), [
    'valign' => 'center'
] );
$cell->addText( '#', 'f_bold', 'p_center' );

$cell = $table->addCell( \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 3.36 ), [
    'valign' => 'center'
] );
$cell->addText( 'Telefoninumber', 'f_bold', 'p_center' );

$cell = $table->addCell( \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 2.49 ), [
    'valign' => 'center'
] );
$cell->addText( 'Täiendav lisanumber', 'f_bold', 'p_center' );

$cell = $table->addCell( \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 4.74 ), [
    'valign' => 'center'
] );
$cell->addText( 'SIM-kaardi number', 'f_bold', 'p_center' );

$cell = $table->addCell( \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 3.36 ), [
    'valign' => 'center'
] );
$cell->addText( 'Krediidilimiit, EUR käibemaksuta', 'f_bold', 'p_center' );

$cell = $table->addCell( \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 2.23 ), [
    'valign' => 'center'
] );
$cell->addText( 'Teenuse liik', 'f_bold', 'p_center' );

foreach ( $info['numbers'] as $i => $number ) {
    $table->addRow();

    $cell = $table->addCell( \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 0.75 ), [
        'valign' => 'center'
    ] );
    $cell->addText( $i + 1 . '.', '', 'p_center' );

    $cell = $table->addCell( \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 3.36 ), [
        'valign' => 'center'
    ] );
    $cell->addText( $number, '', 'p_left' );

    $cell = $table->addCell( \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 2.49 ), [
        'valign' => 'center'
    ] );
    $cell->addText( '-', '', 'p_center' );

    $cell = $table->addCell( \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 4.74 ), [
        'valign' => 'center'
    ] );
    $cell->addText( $info['sim'][$i], '', 'p_center' );

    $cell = $table->addCell( \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 3.36 ), [
        'valign' => 'center'
    ] );
    $cell->addText( '60', '', 'p_center' );

    $cell = $table->addCell( \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 2.23 ), [
        'valign' => 'center'
    ] );
    $cell->addText( 'CSC', '', 'p_center' );
    $cell->addText( 'MOBILE', '', 'p_center' );
}

$section->addText( '' );


$section->addListItem( 'KLIENDILE osutatavad lisateenused:', 0, '', 'multilevel-2', 'p_justify' );

$table = $section->addTable( [
    'width'            => \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 16.92 ),
    'borderColor'      => '000000',
    'borderSize'       => 6,
    'indent'           => new \PhpOffice\PhpWord\ComplexType\TblWidth( \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 0.83 ) ),
    'cellMarginTop'    => \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 0.14 ),
    'cellMarginBottom' => \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 0.14 ),
    'cellMarginLeft'   => \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 0.14 ),
    'cellMarginRight'  => \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 0.14 )
] );

$table->addRow();

$cell = $table->addCell( \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 5.4 ), [
    'valign' => 'center'
] );
$cell->addText( 'Lisateenused', 'f_bold', 'p_center' );

$cell = $table->addCell( \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 3.22 ), [
    'valign' => 'center'
] );
$cell->addText( 'Telefoninumbrid', 'f_bold', 'p_center' );

$cell = $table->addCell( \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 7.05 ), [
    'valign' => 'center'
] );
$cell->addText( 'Tingimused/eritingimused', 'f_bold', 'p_center' );


$table->addRow();

$cell = $table->addCell( \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 5.4 ) );
$cell->addText( 'Kõnepost', '', 'p_left' );

$cell = $table->addCell( \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 3.22 ) );
$cell->addText( '', '', 'p_left' );

$cell = $table->addCell( \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 7.05 ) );
$cell->addText( '', '', 'p_left' );


$table->addRow();

$cell = $table->addCell( \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 5.4 ) );
$cell->addText( 'Cell ID (kärjetunnus)', '', 'p_left' );

$cell = $table->addCell( \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 3.22 ) );
$cell->addText( '', '', 'p_left' );

$cell = $table->addCell( \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 7.05 ) );
$cell->addText( '', '', 'p_left' );


$table->addRow();

$cell = $table->addCell( \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 5.4 ) );
$cell->addText( 'Muud teenused:', '', 'p_left' );

$cell = $table->addCell( \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 3.22 ) );
$cell->addText( '', '', 'p_left' );

$cell = $table->addCell( \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 7.05 ) );
$cell->addText( '', '', 'p_left' );

$section->addText( '', '', 'p_left' );


$section->addListItem( 'Ettemaksed: puuduvad.', 0, '', 'multilevel-2', 'p_left' );
$section->addListItem( 'KLIENDI poolt CSC TELECOMILT ostetud e-kommunikatsiooni seadmed ja muu kaup ning CSC TELECOMI poolt KLIENDILE pakutud teenused, ning sellistele kaupadele/teenustele kohaldatud allahindlus: puudub.', 0, '', 'multilevel-2', 'p_left' );
$section->addListItem( 'CSC TELECOMI mobiilipakettide kasutamise tingimused on toodud kodulehel: https://csc.ee/et/mobiil-tingimused/', 0, '', 'multilevel-2', 'p_left' );
$section->addListItem( 'KLIENDILE Teenuste eest esitatud arved: ', 0, '', 'multilevel-2', 'p_left' );

$table = $section->addTable( [
    'width'            => \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 16.92 ),
    'borderColor'      => '000000',
    'borderSize'       => 6,
    'indent'           => new \PhpOffice\PhpWord\ComplexType\TblWidth( \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 0.83 ) ),
    'cellMarginTop'    => \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 0.14 ),
    'cellMarginBottom' => \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 0.14 ),
    'cellMarginLeft'   => \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 0.14 ),
    'cellMarginRight'  => \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 0.14 )
] );

$table->addRow();

$cell = $table->addCell( \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 8.46 ) );
$cell->addText( 'Tellija registreeritud e-post:', 'f_bold', 'p_center' );

$cell = $table->addCell( \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 8.46 ) );
$cell->addText( 'Postiga saatmine (tasu 5 EUR + käibemaks)', 'f_bold', 'p_center' );

$table->addRow();

$cell = $table->addCell( \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 8.46 ) );
$cell->addText( $info['email'], '', 'p_center' );

$cell = $table->addCell( \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 8.46 ) );
$cell->addText( 'Soodustus 100%', '', 'p_center' );

$section->addPageBreak();

$table = $section->addTable( [
    'width'            => \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 18 ),
    'cellMarginTop'    => \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 0.14 ),
    'cellMarginBottom' => \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 0.14 ),
    'cellMarginLeft'   => \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 0.14 ),
    'cellMarginRight'  => \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 0.14 )
] );

$table->addRow();

$cell = $table->addCell( \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 1.2 ) );
$cell->addText( '', '', 'p_left' );

$cell = $table->addCell( \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 6 ) );
$cell->addText( 'CSC TELECOM', '', 'p_left' );
$cell->addText( $info['rep_name'], '', 'p_left' );
$cell->addText( $info['rep_position'], '', 'p_left' );
$cell->addText( '/allkirjastatud digitaalselt/', 'f_italic', 'p_left' );
$cell->addText( '', '', 'p_left' );
$cell->addText( '___________________________________', '', 'p_left' );


$cell = $table->addCell( \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 2.8 ) );
$cell->addText( '', '', 'p_left' );

$cell = $table->addCell( \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 6 ) );
$cell->addText( 'KLIENT', '', 'p_left' );
$cell->addText( $info['name'], '', 'p_left' );
$cell->addText( $info['position'], '', 'p_left' );
$cell->addText( '/allkirjastatud digitaalselt/', 'f_italic', 'p_left' );
$cell->addText( '', '', 'p_left' );
$cell->addText( '___________________________________', '', 'p_left' );


$section->addText( '', '', 'p_left' );
$section->addText( '', '', 'p_left' );
$section->addText( '', '', 'p_left' );

$textrun = $section->createTextRun( 'p_left' );
$textrun->addText( 'LISA 2.1' );
$textrun->addText( 'TELEKOMMUNIKATSIOONITEENUSE LEPINGULE NR. ' . $info['contract_number'], 'f_bold' );

$section->addText( 'TEENUSTE TARIIFID', '', 'p_center' );


$table = $section->addTable( [
    'width'            => \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 18 ),
    'cellMarginTop'    => \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 0.14 ),
    'cellMarginBottom' => \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 0.14 ),
    'cellMarginLeft'   => \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 0.14 ),
    'cellMarginRight'  => \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 0.14 )
] );

$table->addRow();

$cell = $table->addCell( \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 9 ) );
$cell->addText( '', '', 'p_left' );

$cell = $table->addCell( \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 9 ) );
$cell->addText( 'Tallin, ' . date( 'd.m.Y' ), '', 'p_left' );
$cell->addText( 'Paketid ja kuutasud', 'f_bold', 'p_left' );


$table = $section->addTable( [
    'width'            => \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 18 ),
    'cellMarginTop'    => \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 0.14 ),
    'cellMarginBottom' => \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 0.14 ),
    'cellMarginLeft'   => \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 0.14 ),
    'cellMarginRight'  => \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 0.14 ),
    'borderColor'      => '000000',
    'borderSize'       => 6,
] );

$table->addRow();

$cell = $table->addCell( \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 9 ) );
$cell->addText( 'Paketi', 'f_bold', 'p_left' );

$cell = $table->addCell( \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 9 ) );
$cell->addText( 'Hind, Eur/ kuu', '', 'p_left' );

foreach ( $info['packs'] as $pack ) {
    $table->addRow();

    $cell = $table->addCell( \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 9 ) );
    $cell->addText( $pack['name'], '', 'p_left' );

    $cell = $table->addCell( \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 9 ) );
    $cell->addText( $pack['price'], '', 'p_left' );
}

$section->addText( '', '', 'p_left' );
$section->addText( '', '', 'p_left' );

$section->addListItem( 'Lisateenuste tasud:', 0, '', 'multilevel-3', '' );

$table = $section->addTable( [
    'width'            => \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 18 ),
    'cellMarginTop'    => \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 0.14 ),
    'cellMarginBottom' => \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 0.14 ),
    'cellMarginLeft'   => \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 0.14 ),
    'cellMarginRight'  => \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 0.14 ),
    'borderColor'      => '000000',
    'borderSize'       => 6,
] );

$table->addRow();

$cell = $table->addCell( \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 9 ), [
    'valign' => 'center'
] );
$cell->addText( 'Lisateenused', 'f_bold', 'p_left' );

$cell = $table->addCell( \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 3 ), [
    'valign' => 'center'
] );
$cell->addText( 'Hind, Eur.', 'f_bold', 'p_center' );

$cell = $table->addCell( \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 3 ), [
    'valign' => 'center'
] );
$cell->addText( 'Allahindlus', 'f_bold', 'p_center' );

$cell = $table->addCell( \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 3 ), [
    'valign' => 'center'
] );
$cell->addText( 'Hind 24 kuu lepingu puhul Eur.', 'f_bold', 'p_center' );


$table->addRow();

$cell = $table->addCell( \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 9 ) );
$cell->addText( 'Ühe numbri aktiveerimistasu', '', 'p_left' );

$cell = $table->addCell( \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 3 ) );
$cell->addText( '8€', '', 'p_center' );

$cell = $table->addCell( \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 3 ) );
$cell->addText( '100%', '', 'p_center' );

$cell = $table->addCell( \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 3 ) );
$cell->addText( '-', '', 'p_center' );

$section->addText( '', '', 'p_left' );

$section->addListItem( 'Kõik hinnad on toodud käibemaksuga.', 0, '', 'multilevel-3', '' );

$section->addListItem( 'Kõiki tariife ja teenuseid kirjeldatakse CSC TELECOMI kodulehel www.csc.ee', 0, '', 'multilevel-3', '' );

$section->addText( '', '', 'p_left' );
$section->addText( '', '', 'p_left' );
$section->addText( '', '', 'p_left' );
$section->addText( '', '', 'p_left' );
$section->addText( '', '', 'p_left' );

$table = $section->addTable( [
    'width'            => \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 18 ),
    'cellMarginTop'    => \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 0.14 ),
    'cellMarginBottom' => \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 0.14 ),
    'cellMarginLeft'   => \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 0.14 ),
    'cellMarginRight'  => \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 0.14 )
] );

$table->addRow();

$cell = $table->addCell( \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 1.2 ) );
$cell->addText( '', '', 'p_left' );

$cell = $table->addCell( \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 6 ) );
$cell->addText( 'CSC TELECOM', '', 'p_left' );
$cell->addText( $info['rep_name'], '', 'p_left' );
$cell->addText( $info['rep_position'], '', 'p_left' );
$cell->addText( '/allkirjastatud digitaalselt/', 'f_italic', 'p_left' );
$cell->addText( '', '', 'p_left' );
$cell->addText( '___________________________________', '', 'p_left' );


$cell = $table->addCell( \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 2.8 ) );
$cell->addText( '', '', 'p_left' );

$cell = $table->addCell( \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 6 ) );
$cell->addText( 'KLIENT', '', 'p_left' );
$cell->addText( $info['name'], '', 'p_left' );
$cell->addText( $info['position'], '', 'p_left' );
$cell->addText( '/allkirjastatud digitaalselt/', 'f_italic', 'p_left' );
$cell->addText( '', '', 'p_left' );
$cell->addText( '___________________________________', '', 'p_left' );