<?php
    ob_start();
    include(dirname(__FILE__).'/cetak_buku_wisuda.php');
   
    $content = ob_get_clean();
    require_once(dirname(__FILE__).'/html2pdf/html2pdf.class.php');
    try
    {
        $html2pdf = new HTML2PDF('P', 'A4', 'fr');
        $html2pdf->setTestTdInOnePage(false);
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('buku_wisuda_unisba.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
?>