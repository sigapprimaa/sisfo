<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
 
<table border="1">
	<thead bgcolor="yellow">
	<tr>
		<th>No</th>
		<th>NPK</th>
		<th>Nama</th>
		<th>Tempat , Tanggal Lahir</th>
		<th>Agama</th>
		<th>Alamat</th>
		<th>NO KTP</th>
		<th>NO KK</th>
		<th>Status Karyawan</th>
		<th>ARH</th>
		<th>Tempat Instalasi</th>
		<th>Posisi status</th>
		<th>No KTA </th>
		<th>BPJS Kesehatan</th>
		<th>BPJS Ketenagakerjaan</th>
		<th>Tinggi Badan</th>
		<th>Berat Badan</th>
		<th>Pendidikan Terakhir</th>
		<th>Jurusan</th>
		<th>SKILL</th>
		<th>Pengalaman </th>
		<th>Nama Istri / NIK / No BPJS</th>
		<th>Nama Anak 1 / NIK / BPJS</th>
		<th>Nama Anak 2 / NIK / BPJS</th>
		<th>Nama Anak 3 / NIK / BPJS</th>
	</tr>
</thead>

	<tbody>
	<?php $no = 1 ;  foreach($output as $r) : ?>
		<tr>
			<td><?= $no++ ?></td>
			<td><?= $r->npk ?></td>
			<td><?= $r->nama ?></td>
			<td><?= $r->tempat_lahir . ", " . $r->tgl_lahir ?></td>
			<td><?= $r->agama ?></td>
			<td><?= $r->alamat ?></td>
			<td><?= $r->nik ?></td>
			<td><?= $r->no_kk ?></td>
			<td><?= $r->status ?></td>
			<td><?= $r->arh ?></td>
			<td><?= $r->instalasi ?></td>
			<td><?= $r->posisi_status ?></td>
			<td><?= $r->no_kta ?></td>
			<td><?= $r->bpjs_kesehatan ?></td>
			<td><?= $r->bpjs_ktu ?></td>
			<td><?= $r->tinggi ?> CM</td>
			<td><?= $r->berat ?> KG</td>
			<td><?= $r->pendidikan_terakhir ?></td>
			<td><?= $r->jurusan ?></td>
				<td>
					<?php $skill = $this->db->get_where("skill", array('id_karyawan' => $r->id_karyawan));
					 foreach($skill->result() as $skill2) : ?>
							<li><?= $skill2->skill ?></li>
					<?php endforeach ?>
				</td>
				<td>
					<?php $pengalaman = $this->db->get_where("pengalaman", array('id_karyawan' => $r->id_karyawan));
					 foreach($pengalaman->result() as $pengalaman2) : ?>
							<li><?= $pengalaman2->pengalaman ?></li>
					<?php endforeach ?>
				</td>
				<td>
					<?php $pasangan = $this->db->get_where("pasangan", array('id_karyawan' => $r->id_karyawan));
					 foreach($pasangan->result() as $pasangan2) : ?>
							<li><?= $pasangan2->nama . " / " . $pasangan2->nik . " / " . $pasangan2->no_bpjs ?></li>
					<?php endforeach ?>
				</td>
				<?php $anak = $this->db->get_where("anak", array('id_karyawan' => $r->id_karyawan));
					 foreach($anak->result() as $anak2) : ?>
							<td><?= $anak2->nama . ' / ' . $anak2->nik . ' / ' . $anak2->no_bpjs ?></td>
				<?php endforeach ?>
			
		</tr>
	<?php endforeach ; ?>		
	</tbody>
</table>
</body>
</html>