<dl>
    <dt>Nama Lengkap</dt>
    <dd><?= $name ?></dd>
    <dt>Jenis Kelamin</dt>
    <dd><?= $jenis_kelamin == 1 ? 'Laki - Laki' : 'Perempuan' ?></dd>
    <dt>Tempat, Tanggal Lahir</dt>
    <dd><?= $tempat_lahir.', '.$tanggal_lahir ?></dd>
    <dt>Alamat</dt>
    <dd><?= $alamat ?></dd>
    <dt>Role</dt>
    <dd><?= $role ?? '-' ?></dd>
    <dt>Created Date</dt>
    <dd><?= $created_date ?? '-' ?></dd>
</dl>