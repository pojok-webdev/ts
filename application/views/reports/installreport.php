<?php
/**
 * HTML2PDF Librairy - example
 *
 * HTML => PDF convertor
 * distributed under the LGPL License
 *
 * @author      Laurent MINGUET <webmaster@html2pdf.fr>
 *
 * isset($_GET['vuehtml']) is not mandatory
 * it allow to display the result in the HTML format
 */

    // get the HTML
    ob_start();
    include(dirname(__FILE__).'/puji/installreport.php');
    $content = ob_get_clean();

    // convert to PDF
    require_once(dirname(__FILE__).'/puji/class/html2pdf.class.php');
    try
    {
        $this->config->load('padi');
        $html2pdf = new HTML2PDF('P', 'A4', 'fr', true, 'UTF-8', 3);
        $html2pdf->pdf->SetDisplayMode('fullpage');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        //$html2pdf->Output('exemple03.pdf');
        $localfile = $this->config->item('localfile');
        $lf = str_replace('file1',$obj->cid."-".$obj->siteid."-".str_replace("/","_",str_replace(" ","-",$obj->name)),$localfile);
        $html2pdf->output($lf, 'F');
        //$html2pdf->output($localfile);
        if(1==1){
            sendfile(array(
                'localfile'=>$lf,
                'output'=>str_replace(' ','-',$obj->cid."-".$obj->siteid."-".str_replace("/","_",$obj->name))
                )
            );
        }
        redirect('/installs');
//        $this->ftp->upload('/local/path/to/myfile.html', '/public_html/myfile.html', 'ascii', 0775);
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
