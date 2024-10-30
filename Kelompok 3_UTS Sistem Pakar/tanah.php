<div class="page-header">
    <h1>Jenis Tanah</h1>
</div>
<div class="panel panel-default">
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr class="nw">
                    <th>No</th>
                    <th>Kode</th>
                    <th>Jenis Tanah</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <?php
            $q = esc_field(_get('q'));
            $rows = $db->get_results("SELECT * FROM tb_tanah
                WHERE kode_tanah LIKE '%$q%' OR jenis_tanah  LIKE '%$q%' OR keterangan LIKE '%$q%' 
                ORDER BY kode_tanah");
            $no = 0;
            foreach ($rows as $row) : ?>
                <tr>
                    <td><?= ++$no ?></td>
                    <td><?= $row->kode_tanah ?></td>
                    <td><?= $row->jenis_tanah ?></td>
                    <td><?= $row->keterangan ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>