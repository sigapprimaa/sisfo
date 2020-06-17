<!DOCTYPE html>
<html>
<head>
	<title></title>
<style>
	body {
		font-size: 8.5px;
		font-family: arial ;
	}
	.title {
		text-align: center;
	}
	.header {
		margin-top: 100px;
	}

	.paper {
		border: 0px solid;
		width: 100%;
	}

	.colom-1 {
		width: 50%;
		text-align: justify;
		margin-top: 0px;
	}

	.colom-3 {
		width: 50%;
		text-align: justify;
		margin-top: 48.9px;
	}

	.colom-5 {
		width: 50%;
		text-align: justify;
		margin-top: 50px;
	}
	.colom-2 {
		width: 50%;
		text-align: justify;
		position: absolute;
		left: 50%;
		top: 34.5%;
		display: block;
	}

	.colom-4 {
		width: 50%;
		text-align: justify;
		position: absolute;
		left: 50%;
		top: -6%;
		display: block;
	}
	.pasal-1  {
		margin-bottom: -10px;
	}
	.pasal-2 {
		margin-bottom: -10px;
	}
	.pasal-3 {
		margin-bottom: -10px;
	}

	.pasal-5 {
		margin-top: 3px;
	}
	.pasal-6 {
		margin-top: 5px;
	}

	.pasal-7 {
		margin-top: 4px;
		margin-bottom: -13px;
	}

	.pasal-8 {
		margin-top: 4px;
	}

	.next-pasal-4{
		margin-top: -25px;
	}
	.next-pasal-5{
		margin-bottom: -10px;
	}



	.list {
		margin-top: 5px;
	}
	.list-2 {
		margin-left: -27px;
	}

	.tertanda {
		position: relative;
	}
	.pp {
		margin-left: 12px;
	}
	.pk {
		position: absolute;
		top: 	376px;
		left: 210px; 
	}
</style>
</head>
<body>
<div class="header">
	<h2 class="title">
		<u>PERJANJIAN KERJA WAKTU TERTENTU (PKWT)</u><br>
		NO : <?= $pkwt->pkwt ?>
	</h2>
	<p>
		Sehubungan dengan Perjanjian Kerja Sama antara PT Sigap Prima Astrea dengan ,  maka perusahaan membutuhkan karyawan dengan status PKWT dan karyawan bersedia menerima pekerjaan dengan status PKWT. Pada hari <?= $pkwt->hari ?>, tanggal <?= $pkwt->tgl ?> (<?= $pkwt->terbilang ?>), telah dibuat dan ditandatangani Perjanjian Kerja Waktu Tertentu oleh dan antara :
	</p>
	<p style="margin-top: -4px;">
		<b>PT Sigap Prima Astrea</b>, berkedudukan di Jakarta, beralamat lengkap di Jalan Gaya Motor II No. 1, Sunter II, Jakarta Utara, 14330, dalam hal ini diwakili oleh <?= $pkwt->pihak_pertama ?>, <?= $pkwt->status_pp ?> PT Sigap Prima Astrea, bertindak selaku kuasa Direksi PT Sigap Prima Astrea berdasarkan surat kuasa No. 054/DIR/SPA/IX/2019 tertanggal 11-9-2019, untuk selanjutnya disebut sebagai :
	</p>
</div>
	<center>
	<h2 style="margin-top: -10px">............................................................................<b><b>PIHAK PERTAMA</b></b>............................................................................</h2></center>

	<table style="margin-top: -14px;">
	<tr>
		<td>Nama</td>
		<td>:</td>
		<td><?= $pkwt->nama ?></td>
	</tr>
	<tr>
		<td>Alamat</td>
		<td>:</td>
		<td><?= $pkwt->alamat ?></td>
	</tr>
	<tr>
		<td>No.KTP</td>
		<td>:</td>
		<td><?= $pkwt->no_ktp ?></td>
	</tr>
	<tr>
		<td>NPK</td>
		<td>:</td>
		<td><?= $pkwt->npk_br ?></td>
	</tr>
	<tr>
		<td>Tempat Tugas</td>
		<td>:</td>
		<td><?= $pkwt->tempat_tugas ?></td>
	</tr>
	<tr>
		<td colspan="4">Dalam hal ini bertindak untuk diri sendiri selaku pribadi untuk selanjutnya disebut sebagai :</td>
	</tr>
</table>
	<center>
	<h2 style="margin-top: 2px;">...............................................................................<b><b>PIHAK KEDUA</b></b>...............................................................................</h2></center>
	<p style="margin-top: -12px;">
		<b><b>PIHAK PERTAMA</b></b> dan <b><b>PIHAK KEDUA</b></b> (untuk selanjutnya secara bersama-sama disebut sebagai "Para Pihak"), masing-masing bertindak dalam kedudukan tersebut di atas dengan ini menyatakan setuju dan sepakat untuk membuat dan menandatangani Perjanjian Kerja Waktu Tertentu (selanjutnya disebut "Perjanjian") ini, dengan ketentuan-ketentuan dan syarat-syarat sebagai berikut :
	</p>

<div class="paper">
	<div class="colom-1">
		<div class="pasal-1">
			<center><b>PASAL 1 <br><u>LINGKUP PEKERJAAN</u></b></center>
			<ol class="list">
				<li>
					<b>PIHAK PERTAMA</b> merupakan perusahaan penyedia jasa keamanan, dan oleh karenanya menawarkan pekerjaan untuk melaksanakan tugas sebagai tenaga pengaman (selanjutnya disebut “Satpam”) kepada <b>PIHAK KEDUA</b>.
				</li>
				<li>
					<b>PIHAK KEDUA</b> menerima baik pekerjaan tersebut dalam ayat 1 pasal ini dari <b>PIHAK PERTAMA</b>, dan memahami bahwa Perjanjian ini diadakan karena adanya permintaan/order sehingga pekerjaan tersebut merupakan pekerjaan yang sifatnya tidak terus menerus, terputus-putus, dibatasi waktu, bukan merupakan bagian dari suatu proses produksi.
				</li>
			</ol>
		</div>

		<div class="pasal-2">
			<center><b>PASAL 2<br><u>JANGKA WAKTU</u></b></center>
			<ol class="list">
				<li>
					Perjanjian ini berlaku efektif terhitung sejak tanggal <?= $pkwt->start ?> (<?= $pkwt->terbilang_1 ?>) sampai dengan tanggal <?= $pkwt->end_date ?> (<?= $pkwt->terbilang_2 ?>).
				</li>
				<li>
					Setelah berakhirnya jangka waktu tersebut dalam ayat 1 pasal ini, Perjanjian ini dapat diperpanjang atas kesepakatan Para Pihak secara tertulis.
				</li>
			</ol>
		</div>

		<div class="pasal-3">
			<center><b>PASAL 3<br><u>KEWAJIBAN <b>PIHAK KEDUA</b></u></b></center>
			<ol class="list">
				<li>
					Sebagai Satpam, <b>PIHAK KEDUA</b> menyatakan sanggup dan dengan demikian mengikatkan diri kepada <b>PIHAK PERTAMA</b> untuk :
						<ol type="a" class="list-2">
							<li>
								Melaksanakan secara patuh dan sebaik-baiknya semua perintah dan/atau penugasan yang diberikan/disampaikan oleh <b>PIHAK PERTAMA</b> atau pejabat atau atasan atau pihak lain yang ditunjuk oleh <b>PIHAK PERTAMA</b>, baik lisan maupun tertulis, sepanjang perintah dan/atau penugasan tersebut sesuai dengan tugas dan fungsi pokok selaku Satpam maupun tugas tambahan lainnya yang dipandang perlu oleh <b>PIHAK PERTAMA</b> serta sesuai dengan norma-norma umum dan peraturan perundang-undangan yang berlaku di Indonesia.
							</li>
							<li>
								Sanggup dan bersedia untuk ditempatkan dan ditugaskan atau diperbantukan di tempat <b>PIHAK PERTAMA</b>, atau di tempat atau di lokasi atau instalasi lain yang ditunjuk oleh <b>PIHAK PERTAMA</b> di seluruh wilayah Republik Indonesia.
							</li>
						</ol>
				</li>

				<li>
					<b>PIHAK KEDUA</b> bersedia untuk ikut serta dalam program pelatihan/training atau pembinaan yang diselenggarakan oleh <b>PIHAK PERTAMA</b> khususnya, tetapi tidak terbatas pada pelatihan/training atau pembinaan manajemen maupun keterampilan dan/atau kecakapan khusus dalam rangka peningkatan kualitas pelaksanaan tugas pekerjaan sebagai Satpam.
				</li>
				<li>
					<b>PIHAK KEDUA</b> menyatakan tidak keberatan untuk mengikuti dan tunduk pada ketentuan-ketentuan shift kerja yang ditetapkan oleh <b>PIHAK PERTAMA</b>, termasuk ketentuan shift kerja malam sesuai dengan pengaturan jadwal kerja yang ditetapkan <b>PIHAK PERTAMA</b>.
				</li>
			</ol>
		</div>

		<div class="pasal-4">
			<center><b>PASAL 4<br><u>IMBALAN JASA/UPAH</u></b></center>
			<ol class="list" style="margin-bottom: 0px;">
				<li>
					Selama terikat dalam Perjanjian ini <b>PIHAK PERTAMA</b> setuju untuk dan akan memberikan imbalan jasa/upah kepada <b>PIHAK KEDUA</b> berupa gaji pokok sebesar Rp. <?= number_format($pkwt->gp,0) ?>; (<?= $pkwt->terbilang_3 ?>) sesuai perjanjian antara <b>PIHAK PERTAMA</b> dengan pengguna jasa Satpam yang menjadi rekanan dari <b>PIHAK PERTAMA</b> dimana <b>PIHAK KEDUA</b> ditempatkan/ditugaskan oleh <b>PIHAK PERTAMA</b>, setiap bulan yang akan dibayarkan melalui Bank <?= $pkwt->bank ?> No. Rek. <?= $pkwt->rekening ?>. 
				</li>
				<li>
					Sosial (“BPJS”) ketenagakerjaan sebesar 2% (dua persen), BPJS kesehatan sebesar 1% (satu persen) dan BPJS pensiun sebesar 1% (satu persen) dari gaji pokok, untuk setiap bulannya, yang akan dipotong secara langsung oleh <b>PIHAK PERTAMA</b> dari gaji pokok <b>PIHAK KEDUA</b>.
				</li>
			</ol>
	<center><b style="margin-top: 60px;">PASAL 5 <br><u>PELANGGARAN DAN PENGUNDURAN DIRI</u></b></center>
		<ol class="list" >
				<li>
					Apabila oleh karena sesuatu hal <b>PIHAK KEDUA</b> secara sepihak memutuskan untuk mengundurkan diri (memutuskan hubungan kerja) sebelum jangka waktu tersebut dalam Pasal 2 (dua) Perjanjian ini berakhir, maka <b>PIHAK KEDUA</b> wajib untuk memberitahukan kepada <b>PIHAK PERTAMA</b> tentang maksud tersebut secara tertulis 1 (satu) bulan sebelumnya. Dan dalam hal demikian <b>PIHAK PERTAMA</b> tidak berkewajiban untuk membayar sisa imbalan jasa/upah kepada <b>PIHAK KEDUA</b> atas sisa jangka waktu yang masih ada, dan demikian pula sebaliknya, <b>PIHAK KEDUA</b> tidak berhak menuntut dan/atau menagih dalam bentuk apapun dan dengan cara bagaimanapun tentang sisa uang imbalan jasa/upah untuk jangka waktu yang masih ada tersebut.
				</li>
		</ol>
		</div>

	</div>

	<div class="colom-2">


		<div class="pasal-5">
			<ol class="list" start="2">
				<li>
					Apabila dalam masa berlakunya Perjanjian ini <b>PIHAK KEDUA</b> mangkir dalam menjalankan tugasnya selama hari kerja (sesuai hari/waktu kerja yang ditetapkan kepada dan berlaku bagi <b>PIHAK KEDUA</b>) dan/atau menolak melaksanakan tugas yang dibebankan kepadanya atau melakukan perbuatan melawan hukum, maka <b>PIHAK KEDUA</b> dinyatakan lalai dalam melaksanakan tugas dan untuk itu tidak diperlukan lagi adanya pembuktian dalam bentuk apapun sehingga <b>PIHAK PERTAMA</b> tidak berkewajiban untuk memberikan imbalan/uang jasa dalam bentuk apapun, dan segala hal yang berkaitan dengan pemutusan hubungan kerja akan dilakukan sesuai dengan ketentuan dan tata tertib perusahaan serta peraturan perundang-undangan yang berlaku.
				</li>
				<li>
					Apabila dalam masa berlakunya Perjanjian ini <b>PIHAK KEDUA</b> melakukan pelanggaran baik atas peraturan dan tata tertib yang berlaku di lingkungan <b>PIHAK PERTAMA</b> maupun yang berlaku di lingkungan pengguna jasa Satpam yang menjadi rekanan dari <b>PIHAK PERTAMA</b> dimana <b>PIHAK KEDUA</b> ditempatkan/ ditugaskan oleh <b>PIHAK PERTAMA</b>, maka <b>PIHAK KEDUA</b> dapat dikenakan sanksi :
						<ol type="a" class="list-2">
							<li>
								Surat Peringatan Pertama (SP-I), berlaku selama 6 bulan, apabila PIHAK   KEDUA :
								<ol class="list-2">
									<li>Terlambat masuk kerja 3 kali dalam 1 bulan tanpa alasan yang dapat dipertanggungjawabkan/ tanpa izin pimpinan kerja. </li>
									<li>
										Mangkir 1 (satu) hari kerja dalam sebulan.
									</li>
									<li>
										Tidak mengenakan ID Card atau  tanda pengenal yang resmi dikeluarkan oleh <b>PIHAK PERTAMA</b>. 
									</li>
									<li>
										Melakukan pekerjaan yang bukan menjadi tugasnya tanpa perintah pimpinan kerja.
									</li>
									<li>
										Meninggalkan tempat kerja tanpa seizin atasannya.
									</li>
									<li>
										Tidak mematuhi aturan tentang kebersihan dan kerapihan tempat kerja dan alat-alat kerjanya serta lingkungan <b>PIHAK PERTAMA</b>.
									</li>
									<li>
										Tidak mengikuti program uji kompetensi 1 kali tanpa alasan yang dapat dipertanggungjawabkan.
									</li>
									<li>
										Melakukan perbuatan-perbuatan yang dapat digolongkan sebagai perbuatan tidak patut;
									</li>
								</ol>
							</li>
							<li>
								Surat Peringatan Kedua (SP-II), berlaku selama 6 bulan, apabila <b>PIHAK KEDUA</b> : 
								<ol class="list-2">
									<li>
										Melakukan pelanggaran dari SP-I yang jenis/berat pelanggarannya sama dan/atau lebih rendah.
									</li>
									<li>
										Terlambat masuk kerja 5 kali dalam 1 bulan tanpa alasan yang dapat dipertanggungjawabkan/tanpa izin pimpinan kerja.
									</li>
									<li>
										Mangkir 2 hari kerja berturut-turut atau 3 hari kerja tidak berturut-turut dalam sebulan.
									</li>
									<li>
										Bekerja tidak sesuai dengan tugas dan standar operasi yang ditentukan termasuk standar pelayanan terhadap pengguna jasa Satpam yang menjadi rekanan dari <b>PIHAK PERTAMA</b>.
									</li>
									<li>
										Ceroboh melakukan pekerjaan yang dapat menimbulkan kecelakaan/bahaya bagi dirinya sendiri dan/atau orang lain.
									</li>
									<li>
										Bekerja tanpa menaati prosedur dan langkah-langkah keselamatan kerja yang telah ditentukan baginya.
									<li>
										Melakukan perbuatan yang dapat merugikan nama baik <b>PIHAK PERTAMA</b>.
									</li>
									<li>
										Tidak mentaati perintah yang layak dari atasan.
									</li>
									<li>
										Tidak mengikuti pembinaan yang diadakan oleh <b>PIHAK PERTAMA</b>.
									</li>
									<li>
										Mempergunakan barang-barang milik <b>PIHAK PERTAMA</b> untuk kepentingan pribadi tanpa izin pejabat berwenang. 
									</li>
									<li>
										Menyuruh mencatatkan waktu hadirnya atau mencatatkan waktu hadir orang lain
									</li>
								</ol>

								<li>
									Surat Peringatan Ketiga (SP-III), berlaku selama 6 bulan, apabila <b>PIHAK KEDUA</b> :
									<ol class="list-2">
										<li>
											Melakukan pelanggaran dari SP-II yang jenis/berat pelanggarannya sama dan/atau lebih rendah.
										</li>
										<li>
											Terlambat masuk kerja 7 kali dalam 1 bulan tanpa alasan yang dapat dipertanggungjawabkan/tanpa izin pimpinan kerja.
										</li>
										<li>
											Tidak mengikuti program uji kompetensi selama 2 kali berturut-turut tanpa alasan yang dapat dipertanggungjawabkan.
										</li>
										<li>
											Tidak memakai pakaian kerja/seragam yang telah ditetapkan <b>PIHAK PERTAMA</b>. 
										</li>
										<li>
											Mangkir 3 hari berturut-turut atau 5 hari tidak berturut-turut dalam sebulan.
										</li>
										<li>
											Menolak untuk mentaati perintah atau penugasan yang layak dari atasan
										</li>
										<li>
											Dalam melaksanakan tugas menolak menggunakan alat-alat/perlengkapan kesehatan dan keselamatan kerja sebagaimana mestinya.
										</li>
										<li>
											Melakukan perbuatan yang dapat mengganggu ketertiban/ketentraman kerja dan menimbulkan keonaran yang dapat merugikan <b>PIHAK PERTAMA</b>.
										</li>
									</ol>
								</li>
							</li>
						</ol>
				</li>
			</ol>
		</div>
	</div>


	<div class="colom-3">
		<div class="next-pasal-5">
				<ol class="list"  start="9">
					 	<li>
							Tidak melaporkan kepada atasannya tentang adanya potensi bahaya dan/atau gangguan keamanan yang diketahuinya yang dapat merugikan <b>PIHAK PERTAMA</b>.
						</li>
						<li>
							Mengoperasikan kendaraan/ peralatan lainnya dalam tempat kerja tanpa wewenang untuk itu.
						</li>
						<li>
							Di dalam lingkungan <b>PIHAK PERTAMA</b> menyelenggarakan/menghadiri rapat/pertemuan atau mengedarkan/menempelkan poster, plakat, surat edaran, selebaran, brosur atau sejenisnya yang tidak ada kaitannya dengan kepentingan <b>PIHAK PERTAMA</b> tanpa izin yang berwenang.
						</li>
						<li>
							Melalaikan kewajibannya secara sengaja
						</li>
						<li>
							Memindahkan barang milik <b>PIHAK PERTAMA</b> dari tempatnya ke tempat lain di lingkungan <b>PIHAK PERTAMA</b> tanpa izin yang berwenang.
						</li>
						<li>
							Kedapatan menyimpan barang milik <b>PIHAK PERTAMA</b> tanpa alasan yang sah.
						</li>
						<li>
							Tidak cakap melakukan pekerjaan walaupun sudah dicoba di beberapa bagian/tempat.
						</li>
						<li>
							Tidak mencapai target dalam jangka waktu yang telah disepakati
						</li>
				</ol>
		</div>

		<div class="pasal-6">
			<center><b>PASAL 6<br><u>PEMUTUSAN HUBUNGAN KERJA (PHK)</u></b></center>
			<li type="none" style="margin-left: 25px;">
				Pelanggaran yang dapat dikenakan sanksi Pemutusan Hubungan Kerja dengan alasan mendesak dan dilaksanakan sesuai peraturan perundang-undangan yang berlaku adalah
			</li>
			<ol class="list">
				<li>
					Tidur pada waktu jam kerja yang dapat mengakibatkan kerugian pada perusahaan dan atau Perusahaan tempat bertugas.
				</li>
				<li>
					Mengambil/menggunakan barang/uang dilingkungan perusahaan  dan atau Perusahaan tempat bertugas tanpa hak atau tanpa seijin Pimpinan Perusahaan.
				</li>
				<li>
					Mengambil/menggunakan/memindahkan barang/uang dibawah kewenangannya bukan untuk kepentingan Perusahaan dan merugikan Perusahaan tempat bertugas/pihak ketiga.
				</li>
				<li>
					Melakukan kelalaian yang menyebabkan Perusahaan atau Perusahaan tempat bertugas/pihak ketiga menderita kerugian.
				</li>
				<li>
					Membuat/memberikan keterangan tertulis dan atau lisan yang tidak benar/sesuai dengan keadaan sebenarnya.
				</li>
				<li>
					Menyalahgunakan hak jabatan dan fasilitas yang diberikan Perusahaan untuk kepentingan dan keuntungan pribadi ataupun pihak ketiga lainnya di luar ketentuan yang berlaku dan dapat merugikan perusahaan dan Perusahaan tempat bertugas/pihak ketiga.
				</li>
				<li>
					Mabuk, meminum minuman keras yang memabukan, memakai dan atau mengedarkan narkotika, psikotropika, dan zat adiktif lainnya di lingkungan kerja.
				</li>
				<li>
					Melakukan perbuatan asusila atau melakukan perjudian di lingkungan Perusahaan atau Perusahaan tempat bertugas dan /atau dalam jam kerja.
				</li>
				<li>
					Memperdagangkan barang terlarang baik dalam lingkungan Perusahaan maupun di luar lingkungan Perusahaan atau Perusahaan tempat bertugas.
				</li>
				<li>
					Menyerang, menganiaya, mengintimidasi, mengancam secara fisik atau mental atau menghina secara kasar teman sekerja atau Pimpinan Perusahaan beserta keluarganya.
				</li>
				<li>
					Membujuk teman sekerja atau Pimpinan Perusahaan melakukan perbuatan yang bertentangan dengan peraturan perundang-undangan.
				</li>
				
				<li>
					Dengan ceroboh atau sengaja merusak atau membiarkan dalam keadaan bahaya barang milik Perusahaan yang menimbulkan kerugian bagi Perusahaan atau Perusahaan tempat bertugas
				</li>
				<li>
					Menerima imbalan jasa dari siapapun karena jabatannya sehingga secara       langsung maupun tidak langsung Perusahaan dirugikan.
				</li>
				<li>
					Dengan sengaja membuat api di tempat yang ada tanda larangan sehingga membahayakan Perusahaan dan atau Perusahaan tempat bertugas.
				</li>
				<li>
					Merokok di dalam bengkel/gudang/lingkungan kerja/bukan tempat merokok atau tempat-tempat lain yang dapat mengakibatkan kebakaran dan dinyatakan terlarang untuk itu.
				</li>
				<li>
					Dengan ceroboh atau sengaja membiarkan teman sekerja atau Pimpinan Perusahaan dalam keadaan bahaya ditempat kerja.
				</li>
				<li>
					Melakukan perkelahian dan atau pemukulan di dalam lingkungan Perusahaan antara sesama Karyawan Perusahaan atau Perusahaan lain yang ditugaskan di Perusahaan atau dengan pelanggan Perusahaan dan atau Perusahaan tempat bertugas
				</li>
				<li>
					Tanpa wewenang dan ijin Pimpinan Perusahaan membawa senjata api/tajam/petasan/bahan peledak lainnya ke dalam lingkungan Perusahaan.
				</li>
				<li>
					Mencari keuntungan untuk dirinya sendiri atau orang lain dengan menggunakan jabatannya, sehingga Perusahaan langsung atau tidak langsung dirugikan.
				</li>
				<li>
					Dengan sengaja atau karena lalai mengakibatkan dirinya dalam keadaan sedemikian rupa, sehingga ia tidak dapat menjalankan pekerjaan.
				</li>
				<li>
					Bekerja pada Perusahaan diluar group dan /atau mempunyai usaha sendiri yang dapat mengganggu pelaksanaan tugasnya di Perusahaan.
				</li>
				<li>
					Memberikan konsultasi atau pelatihan di bidang bisnis dan manajemen kepada pihak lain yang merupakan kompetensi dan atau rahasia Perusahaan tanpa seijin atasan sehingga merugikan Perusahaan dan atau Perusahaan tempat bertugas.
				</li>
				<li>
					Melakukan perbuatan lainnya di lingkungan Perusahaan yang diancam pidana penjara 5(lima) tahun atau lebih.
				</li>
				<li>
					Membantu melakukan perbuatan-perbuatan melawan hukum.
				</li>

			</ol>

			<center><b>PASAL 7<br><u>DOMISILI HUKUM DAN PENYELESAIAN PERSELISIHAN</u></b></center>
			<ol class="list">
				<li>
					Dalam hal terdapat perbedaan pendapat atau perselisihan antara Para Pihak sebagai akibat adanya Perjanjian ini atau dalam hal pelaksanaannya, maka Para Pihak sepakat dan setuju untuk menyelesaikan perselisihan yang timbul tersebut dengan cara musyawarah untuk mufakat, namun demikian apabila tidak dicapai mufakat dalam penyelesaiannya secara musyawarah tersebut, maka Para Pihak sepakat untuk diselesaikan berdasarkan peraturan perundang-undangan yang berlaku.
				</li>
				<li>
					Dalam hal terdapat perbedaan pendapat atau perselisihan antara Para Pihak sebagai akibat adanya Perjanjian ini atau dalam hal pelaksanaannya, maka Para Pihak sepakat dan setuju untuk menyelesaikan perselisihan yang timbul tersebut dengan cara musyawarah untuk mufakat, namun demikian apabila tidak dicapai mufakat dalam penyelesaiannya secara musyawarah tersebut, maka Para Pihak sepakat untuk diselesaikan berdasarkan peraturan perundang-undangan yang berlaku.
				</li>
				<li>
					Tentang Perjanjian ini dan segala akibat hukumnya, Para Pihak memilih tempat tinggal tetap dan seumumnya di wilayah Jakarta Utara.
				</li>
		</div>

	</div>

	<div class="colom-4">

		<div class="pasal-8">
			<center><b>PASAL 8<br><u>KETENTUAN LAIN</u></b></center>
			<ol class="list">
				<li>
					Perjanjian ini tidak dapat dipindahtangankan baik sebagian maupun seluruhnya oleh salah satu pihak dengan cara dan alasan apapun tanpa persetujuan tertulis Para Pihak dan pengguna jasa Satpam dimana <b>PIHAK KEDUA</b> ditempatkan/ditugaskan.
				</li>
				<li>
					Dalam hal <b>PIHAK PERTAMA</b> dibubarkan dan/atau dinyatakan pailit oleh lembaga dan/atau pihak lain yang berkepentingan dan hal tersebut telah mendapat penetapan hukum yang tetap dari badan peradilan yang berkompeten atau karena sesuatu dan lain <b>PIHAK PERTAMA</b> membubarkan diri, atau apabila pengguna jasa Satpam yang menjadi rekanan dari <b>PIHAK PERTAMA</b> dimana <b>PIHAK KEDUA</b> ditempatkan/ditugaskan oleh <b>PIHAK PERTAMA</b> mengakhiri/memutuskan perjanjian kerjasama dengan <b>PIHAK PERTAMA</b>, atau karena sebab dan alasan apapun <b>PIHAK KEDUA</b> tidak dapat melaksanakan tugasnya dengan baik secara permanen selama 3 (tiga) bulan berturut-turut atau karena <b>PIHAK KEDUA</b> meninggal dunia, maka Perjanjian ini dinyatakan berakhir dengan sendirinya tanpa perlu mendapat persetujuan hakim dan dalam hal yang demikian ini maka salah satu pihak tidak dapat menuntut dan/atau menagih pihak lainnya dengan cara dan alasan apapun mengenai pelaksanaan hak dan kewajiban masing-masing pihak yang masih harus dijalani dan
				</li>
					<li>
				Apabila selama bertugas <b>PIHAK KEDUA</b> dikembalikan dari pengguna jasa Satpam yang menjadi rekanan dari <b>PIHAK PERTAMA</b> dimana <b>PIHAK KEDUA</b> ditempatkan/ditugaskan oleh <b>PIHAK PERTAMA</b>, selama 3 (tiga) kali berturut-turut dengan alasan tidak cakap bekerja dan setelah dievaluasi dan dengan bukti yang dapat dipertanggung jawabkan maka <b>PIHAK PERTAMA</b> berhak melakukan pemutusan Perjanjian secara sepihak.
			</li>
			<li>
				Dalam hal pengakhiran dan/atau pemutusan Perjanjian ini secara sepihak oleh salah satu pihak dikarenakan oleh sebab dan alasan apapun, maka Para Pihak sepakat untuk mengesampingkan ketentuan pasal 1266 dan pasal 1267 Kitab Undang-undang Hukum Perdata Republik Indonesia.
			</li>
			<li>
				Segala sesuatu yang dipandang perlu namun tidak dan/atau belum tercantum dalam Perjanjian ini, akan ditetapkan kemudian oleh Para Pihak secara tertulis dan merupakan satu kesatuan yang tidak terpisahkan dengan Perjanjian ini
			</li>
			</ol>
			<li type="none" >
				<p style="margin-left: 15px;">
				Demikian Perjanjian ini dibuat dalam 2 (dua) rangkap, masing-masing ditandatangani oleh Para Pihak dan mempunyai kekuatan hukum yang sama sebagai lembar asli. Lembar asli pertama dipegang oleh <b>PIHAK PERTAMA</b> dan lembar asli kedua dipegang oleh <b>PIHAK KEDUA</b>.
			</p>
			</li>

			<div class="pp">
				<h3 style="margin-bottom: 80px"><b>PIHAK PERTAMA</b></h3>

				<b><u><?= $pkwt->pihak_pertama ?></u><br></b>
				<p style="margin-top: 2px;"><?= $pkwt->status_pp ?></p>
			</div>

			<div class="pk">
				<h3 style="margin-bottom: 80px"><b>PIHAK KEDUA</b></h3>

				<b><u><?= $pkwt->nama ?></u><br></b>

			</div>

		</div>
	</div>
</body>
</html>
