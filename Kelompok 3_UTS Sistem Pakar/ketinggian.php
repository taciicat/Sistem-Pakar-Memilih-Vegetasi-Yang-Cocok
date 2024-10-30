<div class="page-header">
    <h1>Ketinggian</h1>
</div>
<div class="panel panel-default">
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr class="nw">
                    <th>No</th>
                    <th>Kode</th>
                    <th>Ketinggian</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <?php
            $q = esc_field(_get('q'));
            $rows = $db->get_results("SELECT * FROM tb_ketinggian
                WHERE kode_ketinggian LIKE '%$q%' OR ketinggian_tanah  LIKE '%$q%' OR keterangan LIKE '%$q%' 
                ORDER BY kode_ketinggian");
            $no = 0;
            foreach ($rows as $row) : ?>
                <tr>
                    <td><?= ++$no ?></td>
                    <td><?= $row->kode_ketinggian ?></td>
                    <td><?= $row->ketinggian_tanah ?></td>
                    <td><?= $row->keterangan ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>