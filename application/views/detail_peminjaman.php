<html>
<head>
	<title>Library Totalindo</title>
</head>
<body>

<h2>Detail Peminjaman</h2>


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

</table>
</body>
</html>