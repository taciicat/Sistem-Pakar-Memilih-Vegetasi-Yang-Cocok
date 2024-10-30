<div class="page-header">
    <h1>Suhu</h1>
</div>
<div class="panel panel-default">
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr class="nw">
                    <th>No</th>
                    <th>Kode</th>
                    <th>Suhu</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <?php
            $q = esc_field(_get('q'));
            $rows = $db->get_results("SELECT * FROM tb_suhu
                WHERE kode_suhu LIKE '%$q%' OR jenis_suhu  LIKE '%$q%' OR keterangan LIKE '%$q%' 
                ORDER BY kode_suhu");
            $no = 0;
            foreach ($rows as $row) : ?>
                <tr>
                    <td><?= ++$no ?></td>
                    <td><?= $row->kode_suhu ?></td>
                    <td><?= $row->jenis_suhu ?></td>
                    <td><?= $row->keterangan ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>