<?php
    include 'koneksi.php';
    require('../pdf/fpdf.php');

    $pdf = new FPDF("L","cm","A4");

    $pdf->SetMargins(2,1,1);
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Times','B',11);

    $pdf->SetX(4);            
    $pdf->MultiCell(19.5,0.5,'TOKO MANTEP KEBUMEN',0,'L');
    $pdf->SetX(4);
    $pdf->MultiCell(19.5,0.5,'Telpon : 0287 381473',0,'L');    
    $pdf->SetFont('Arial','B',10);
    $pdf->SetX(4);
    $pdf->MultiCell(19.5,0.5,'JL. Letjend Suprapto No 39/43, Kebumen',0,'L');
    $pdf->SetX(4);
    $pdf->MultiCell(19.5,0.5,'website : www.ambigos.com',0,'L');
    $pdf->Line(1,3.1,28.5,3.1);
    $pdf->SetLineWidth(0.1);      
    $pdf->Line(1,3.2,28.5,3.2);   
    $pdf->SetLineWidth(0);
    $pdf->ln(1);
    $pdf->SetFont('Arial','B',14);
    $pdf->Cell(25.5,0.7,"Data Pegawai",0,10,'C');
    $pdf->ln(1);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(5,0.7,"Di cetak pada : ".date("D-d/m/Y"),0,0,'C');
    $pdf->ln(1);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(2, 0.8, 'No', 1, 0, 'C');
    $pdf->Cell(1, 0.8, 'NIP', 1, 0, 'C');
    $pdf->Cell(7, 0.8, 'Nama', 1, 0, 'C');
    $pdf->Cell(3, 0.8, 'Tempat Lahir', 1, 0, 'C');
    $pdf->Cell(4, 0.8, 'Tanggal Lahir', 1, 0, 'C');
    $pdf->Cell(4.5, 0.8, 'Jenis Kelamin', 1, 0, 'C');
    $pdf->Cell(4.5, 0.8, 'Alamat', 1, 0, 'C');
    $pdf->Cell(2, 0.8, 'Tanggal Masuk', 1, 1, 'C');
    $pdf->Cell(2, 0.8, 'Sektor', 1, 1, 'C');
    $pdf->Cell(2, 0.8, 'No Telp', 1, 1, 'C');
    $pdf->Cell(2, 0.8, 'Agama', 1, 1, 'C');
    $pdf->Cell(2, 0.8, 'Pendidikan', 1, 1, 'C');
    $pdf->Cell(2, 0.8, 'No KTP', 1, 1, 'C');
    $pdf->SetFont('Arial','',10);
    
    $no=1;
    
    $query=mysql_query("SELECT * FROM pegawai");
    while($lihat=mysql_fetch_array($query))
    {
    	$pdf->Cell(1, 0.8, $no , 1, 0, 'C');
    	$pdf->Cell(7, 0.8, $lihat['nip'],1, 0, 'C');
    	$pdf->Cell(3, 0.8, $lihat['nama'], 1, 0,'C');
    	$pdf->Cell(4, 0.8, $lihat['tempat_lahir'],1, 0, 'C');
    	$pdf->Cell(4.5, 0.8, $lihat['tgl_lahir'], 1, 0,'C');
    	$pdf->Cell(4.5, 0.8, $lihat['id_jeniskelamin'],1, 0, 'C');
    	$pdf->Cell(2, 0.8, $lihat['alamat'], 1, 1,'C');
    	$pdf->Cell(2, 0.8, $lihat['tgl_masuk'], 1, 1,'C');
    	$pdf->Cell(2, 0.8, $lihat['id_jenispekerjaan'], 1, 1,'C');
    	$pdf->Cell(2, 0.8, $lihat['no_telp'], 1, 1,'C');
    	$pdf->Cell(2, 0.8, $lihat['id_agama'], 1, 1,'C');
    	$pdf->Cell(2, 0.8, $lihat['id_pendidikan'], 1, 1,'C');
    	$pdf->Cell(2, 0.8, $lihat['no_ktp'], 1, 1,'C');

    	$no++;
    }

    $pdf->Output("laporan_buku.pdf","I");

?>