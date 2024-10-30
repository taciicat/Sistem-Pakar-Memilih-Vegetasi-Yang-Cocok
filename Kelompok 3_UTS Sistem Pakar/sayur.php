<div class="page-header">
    <h1>Sayuran</h1>
</div>
<div class="panel panel-default">
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr class="nw">
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama Sayuran</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <?php
            $q = esc_field(_get('q'));
            $rows = $db->get_results("SELECT * FROM tb_sayuran
                WHERE kode_sayuran LIKE '%$q%' OR nama_sayuran  LIKE '%$q%' OR keterangan LIKE '%$q%' 
                ORDER BY kode_sayuran");
            $no = 0;
            foreach ($rows as $row) : ?>
                <tr>
                    <td><?= ++$no ?></td>
                    <td><?= $row->kode_sayuran ?></td>
                    <td><?= $row->nama_sayuran ?></td>
                    <td><?= $row->keterangan ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>