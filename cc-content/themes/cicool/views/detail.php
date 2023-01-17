<?= get_header();?>

<!-- Star Services Area
============================================= -->
<div class="services-style-seven-area default-padding bottom-less" style="background-image: url(<?= theme_assets();?>img/shape/19.png); padding-bottom: 20px;">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="site-heading text-center">
					<h2>Detail</h2>
					<div class="devider"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Services Area -->

<!-- Start Team Single Area
============================================= -->
<div class="team-single-area default-padding">
	<div class="container">
		<div class="team-content-top">
			<div class="row">
				<div class="col-lg-5 left-info">
					<div class="thumb">
						<img src="<?= $data['gambar'];?>" alt="Thumb">
					</div>
				</div>
				<div class="col-lg-7 right-info">
					<h2><?= $data['nama'];?></h2>
					<span><?= $data['jenis'];?></span>
					<table class="table-responsive">
						<tr>
							<td style="vertical-align: top; width: 150px;">Nama Operator</td>
							<td style="vertical-align: top;">&nbsp;:&nbsp;</td>
							<td><?= $data['operator'];?></td>
						</tr>
						<tr>
							<td style="vertical-align: top;">Alamat</td>
							<td style="vertical-align: top;">&nbsp;:&nbsp;</td>
							<td><?= $data['alamat'];?></td>
						</tr>
						<tr>
							<td style="vertical-align: top;">Tinggi Antena</td>
							<td style="vertical-align: top;">&nbsp;:&nbsp;</td>
							<td><?= $data['tinggi'];?></td>
						</tr>
						<tr>
							<td style="vertical-align: top;">Luas Area</td>
							<td style="vertical-align: top;">&nbsp;:&nbsp;</td>
							<td><?= $data['luas'];?></td>
						</tr>
						<tr>
							<td style="vertical-align: top;">Kondisi Jalan</td>
							<td style="vertical-align: top;">&nbsp;:&nbsp;</td>
							<td><?= $data['jalan'];?></td>
						</tr>
						<tr>
							<td style="vertical-align: top;">Site Area</td>
							<td style="vertical-align: top;">&nbsp;:&nbsp;</td>
							<td><?= $data['site'];?></td>
						</tr>
						<tr>
							<td style="vertical-align: top;">Titik Kordinat</td>
							<td style="vertical-align: top;">&nbsp;:&nbsp;</td>
							<td><?= $data['kordinat'];?></td>
						</tr>
						<tr>
							<td style="vertical-align: top;">Kondisi Sekitarnya</td>
							<td style="vertical-align: top;">&nbsp;:&nbsp;</td>
							<td><?= $data['kondisi'];?></td>
						</tr>
						<tr>
							<td style="vertical-align: top;">Pemilik Antena</td>
							<td style="vertical-align: top;">&nbsp;:&nbsp;</td>
							<td><?= $data['pemilik'];?></td>
						</tr>
						<tr>
							<td style="vertical-align: top;">Penyewa Menara</td>
							<td style="vertical-align: top;">&nbsp;:&nbsp;</td>
							<td><?= $data['penyewa'];?></td>
						</tr>
						<tr>
							<td style="vertical-align: top;">No IMB</td>
							<td style="vertical-align: top;">&nbsp;:&nbsp;</td>
							<td><?= $data['imb'];?></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Team Single Area -->

<?= get_footer();?>