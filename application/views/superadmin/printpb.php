<!DOCTYPE html>
<html>
<head>
	<title>Taliasih</title>
<style>
	body {
		font-size : 12px;
		font-family: arial ;
	}

	ol li {
		text-align: justify;
	}
	.text {
		font-style: bold;
	}
	p {
		text-align: justify;
	}
	.header {
		margin-top: 100px;
	}
</style>
</head>
<body>
	<div class="header">
	<center >
		<b style="font-color:red;margin"><u>PERSETUJUAN BERSAMA</u></b><br>No: <?= $pb->no ?>
	</center>
	</div>
	<p>
		Pada hari ini  tanggal, <?= $pb->tanggal ?> (<?= $pb->tgl_terbilang ?>), yang bertanda tangan di bawah ini :
	</p>

	<ol>
		<li>
			<b><?= $pb->pihak_pertama ?></b>,<?= $pb->status_pp ?> PT Sigap Prima Astrea, bertindak selaku kuasa Direksi PT Sigap Prima Astrea berdasarkan surat kuasa No. <?= $pb->no_surat ?>/<?= $pb->surat_kuasa ?> tertanggal <?= $pb->tgl_kuasa ?> (<?= $pb->tbl_terbilang ?>) selanjutnya disebut
		</li>

		<p>----------------------------------------------------------------<b>PIHAK PERTAMA</b>------------------------------------------------------------------</p>

		<li>
			<b><?= $pb->nama ?></b> , NPK<?= ' ' . $pb->npk ?>, tempat tugas di <?= $pb->tempat_tugas ?> bertempat tinggal di <?= $pb->alamat ?> Kel <?= $pb->kelurahan ?> Kec <?= $pb->kecamatan ?>, <?= $pb->kota ?>, Kartu tanda penduduk nomor <?= $pb->no_ktp ?>, selanjutnya disebut
		</li>
		<p>----------------------------------------------------------------<b>PIHAK KEDUA</b>------------------------------------------------------------------</p>
	</ol>

<p>
	<b>PIHAK PERTAMA</b> dan <b>PIHAK KEDUA</b> (selanjutnya disebut “Para Pihak”) tersebut diatas terlebih dahulu menerangkan hal-hal sebagai berikut :
</p>
<ul type="square" style="text-align: justify;">
	<li>
		Bahwa <b>PIHAK PERTAMA</b> adalah Pihak yang mempekerjakan dan memberi upah kepada <b>PIHAK KEDUA</b>.
	</li>
	<li>Bahwa <b>PIHAK KEDUA</b> adalah Pihak yang dipekerjakan dan menerima upah dari <b>PIHAK PERTAMA</b>.</li>
	<li>Bahwa Para Pihak bermaksud dan bersepakat untuk mengakhiri hubungan kerja per tanggal <?= $pb->tgl_berakhir ?>.</li>
	<li>Bahwa dengan diterimanya uang Kompensasi Pengakhiran Hubungan Kerja yang diberikan melepas masa kerja yang telah dilalui sebelumnya. Dengan diadakannya persetujuan bersama ini, <b>PIHAK KEDUA</b> sepakat untuk tidak melakukan tuntutan dikemudian hari terkait dengan hubungan kerja dan/atau tuntutan dalam bentuk apapun.</li>
</ul>

<p>
	Berdasarkan hal-hal yang telah disebutkan diatas, Para Pihak telah saling sepakat untuk mengadakan Persetujuan Bersama (selanjutnya disebut sebagai “Persetujuan Bersama”) dengan syarat-syarat dan ketentuan-ketentuan sebagai berikut :
</p>
<center>
	<h3>Pasal 1</h3>
</center>
<p>
	Atas pengakhiran hubungan kerja ini, <b>PIHAK PERTAMA</b> :<br>
Memberikan Kompensasi Pengakhiran Hubungan Kerja dari Perusahaan sebesar <b> <?= $pb->tali_asih ?>- (<?= $pb->terbilang_3 ?>)</b> netto
</p>


<center>
	<h3>Pasal 2</h3>
</center>
<p>
	Bahwa <b>PIHAK KEDUA</b> menyatakan telah menerima Kompensasi Pengakhiran Hubungan Kerja  yang diberikan oleh <b>PIHAK PERTAMA</b> sebagaimana dimaksud dalam pasal 1 (satu) dalam Persetujuan Bersama ini sebesar <b> <?= $pb->tali_asih ?>,- (<?= $pb->terbilang_3 ?>)</b> dengan pemindah bukuan atau transfer ke rekening atas nama <b>PIHAK KEDUA</b> pada Bank <?= $pb->bank ?> No.<?= $pb->account ?> paling lambat <?= $pb->tgl_dibayar ?>
</p>


<center>
	<h3>Pasal 3</h3>
</center>
	<ol>
			<li>Persetujuan Bersama ini dibuat dan ditandatangani oleh Para Pihak dalam keadaan sadar dan tanpa paksaan dari pihak manapun</li>
			<li>Para Pihak sepakat untuk tidak akan melakukan tuntutan maupun gugatan dalam bentuk apapun dikemudian hari.</li>
	</ol>
<p>
	Demikian Persetujuan Bersama ini dibuat dan ditanda tangani oleh Para Pihak dalam rangkap 2 (dua), bermeterai secukupnya dan mempunyai kekuatan hukum yang sama. Satu lembar asli pertama dipegang oleh <b>PIHAK PERTAMA</b> dan lembar asli kedua dipegang oleh <b>PIHAK KEDUA</b>.
</p>
<br>

<table width="100%" style="margin-left: -8px;position: relative;margin-bottom: 50px;text-align: left;">
	<th align="left"><b>PIHAK PERTAMA</b></th>
	<th width="10%"></th>
	<th></th>
	<th align="left"><b>PIHAK KEDUA</b></th>
</table>
<br><br>
<table width="100%" style="margin-left: -8px;position: relative;">
	<th align="left"><h3><u><?= $pb->pihak_pertama ?></u><br></h3><?= $pb->status_pp ?></th>
	<th width="10%"></th>
	<th></th>
	<th align="left"><h4><u><?= $pb->nama ?></u></h4></th
</table>

</body>
</html>
