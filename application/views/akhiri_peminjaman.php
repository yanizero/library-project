<html>
<head>
	<title>Library Totalindo</title>
</head>
<body>

<h2>Detail Peminjaman</h2>

<?php  echo form_open('peminjaman_cont/akhiri_peminjaman/'.$detail_peminjaman['id_peminjaman'])?>
<table>
	<tr>
		<td>Id Peminjaman:</td>
		<td><?php echo $detail_peminjaman['id_peminjaman']?></td>
	</tr>
	<tr>
		<td>Id Petugas:</td>
		<td><?php echo $detail_peminjaman['id_petugas']?></td>
	</tr>
	<tr>
		<td>Nim:</td>
		<td><?php echo $detail_peminjaman['nim']?></td>
	</tr>
	<tr>
		<td>Kode Buku:</td>
		<td><?php echo $detail_peminjaman['kode_buku']?></td>
	</tr>
	<tr>
		<td>Judul Buku:</td>
		<td><?php echo $detail_peminjaman['judul_buku']?></td>
	</tr>
	<tr>
		<td>Tanggal Pinjam:</td>
		<td><?php echo $detail_peminjaman['tanggal_pinjam']?></td>
	</tr>
	<tr>
		<td>Tanggal Kembali:</td>
		<td><?php echo $detail_peminjaman['tanggal_kembali']?></td>
	</tr>
		<tr>
		<td>Tanggal Pengembalian:</td>
		<td><?php echo form_input('tanggal_pengembalian')?></td>
	</tr>
</table>
<?php echo form_submit('kembali','kembali')?>
<?php echo form_close()?>
</body>
</html>