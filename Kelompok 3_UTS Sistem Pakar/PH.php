<div class="page-header">
    <h1>PH</h1>
</div>
<div class="panel panel-default">
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr class="nw">
                    <th>No</th>
                    <th>Kode</th>
                    <th>PH</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <?php
            $q = esc_field(_get('q'));
            $rows = $db->get_results("SELECT * FROM tb_ph
                WHERE kode_ph LIKE '%$q%' OR rentang_ph  LIKE '%$q%' OR keterangan LIKE '%$q%' 
                ORDER BY kode_ph");
            $no = 0;
            foreach ($rows as $row) : ?>
                <tr>
                    <td><?= ++$no ?></td>
                    <td><?= $row->kode_ph ?></td>
                    <td><?= $row->rentang_ph ?></td>
                    <td><?= $row->keterangan ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>