<div class="row row-xs">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group mg-b-10">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
                            </div>
                            <input type="text" class="form-control dtp_cari" placeholder="Cari di sini"
                                aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <?php if (!$data['student']): ?>
                    <div class="col-md-6 d-none d-md-block">
                        <a href="<?=base_url('app/exam_schedule/create');?>"
                            class="btn btn-sm pd-x-15 btn-primary btn-uppercase mg-l-5 float-right"><i
                                class="fa fa-plus"></i> Tambah</a>
                        <a href="<?= base_url('app/exam_schedule/xfilter') ?>"
                            class="btn btn-sm pd-x-15 <?= $selected = ($data['today']) ? 'btn-success' : 'btn-outline-success'; ?> btn-uppercase mg-l-5 float-right"><i
                                class="fa fa-clock"></i> Hari Ini</a>
                        <a href="#" data-value="Sesi-1"
                            class="filterOrder bSelect btn btn-sm pd-x-15 btn-outline-success btn-uppercase mg-l-5 float-right"><i
                                class="fa fa-anchor"></i> Sesi 1</a>
                        <a href="#" data-value="Sesi-2"
                            class="filterOrder bSelect btn btn-sm pd-x-15 btn-outline-success btn-uppercase mg-l-5 float-right"><i
                                class="fa fa-anchor"></i> Sesi 2</a>
                        <a href="<?= base_url('app/exam_schedule/') ?>" class="btn btn-sm pd-x-15 <?= $selected = ($data['all']) ? 'btn-success' : 'btn-outline-success'; ?> btn-uppercase mg-l-5 float-right"><i
                                class="fa fa-list"></i> Semua</a>
                    </div>
                    <?php endif;?>
                </div>

                <div class="alert alert-info <?=$hide = ($this->session->flashdata('message')) ? '' : 'd-none'?>">
                    <?=$pesan = ($this->session->flashdata('message')) ? $this->session->flashdata('message') : ''?>
                </div>

                <div class="table-responsive">
                    <table class="dtable table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Aksi</th>
                                <th class="wd-30">Soal</th>
                                <th>Kelas</th>
                                <th>Tanggal</th>
                                <th>Jumlah Soal</th>
                                <th>Waktu</th>
                                <th>Dibuat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data['exam_schedule'] as $k => $v): ?>
                            <?php if ( (date("d-m-Y", $v['time_server_now']) == $v['date'] && date("H:i:s", ($v['time_server_now'] + 900)) >= $v['start'] && date("H:i:s", $v['time_server_now']) <= $v['finish']) || !$data['student'] ): ?>

                            <tr>
                                <td><?=$k++ + 1?></td>
                                <td>
                                    <?php if (!$data['student']): ?>
                                    <div class="dropdown">
                                        <button class="btn btn-xs btn-primary dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Pilih
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item"
                                                href="<?=base_url('app/exam_schedule/detail/' . $v['id']);?>"><i
                                                    class="fas fa-folder"></i> Detail</a>
                                            <a class="dropdown-item"
                                                href="<?=base_url('app/exam_schedule/edit/' . $v['id']);?>"><i
                                                    class="fas fa-edit"></i> Edit</a>
                                            <?php if ($v['intime'] == 0): ?>
                                            <a class="dropdown-item hapus" href="#"
                                                data-href="<?=base_url('app/exam_schedule/delete/' . $v['id']);?>"><i
                                                    class="fas fa-trash"></i> Hapus</a>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                    <?php else: ?>
                                    <a class="btn btn-sm btn-success"
                                        href="<?php echo base_url('app/test/confirm/' . $v['id']); ?>"><i
                                            class="fas fa-edit"></i> Ikuti
                                        Ujian</a>
                                    <?php endif;?>

                                </td>
                                <td>
                                    <?php
                                        echo $v['study'];
                                        echo "<br><small>ditampilkan " . $random = ($v['is_random'] == 1) ? 'Acak' : 'Tidak Acak';
                                    ?>
                                </td>
                                <td><?=$v['grade']?></td>
                                <td><?=$v['date'] . "<br><small><span class='badge badge-warning'>" . str_replace(' ', '-', $v['order']) ;?></span></small>
                                </td>
                                <td>Ujian : <?=$v['number_of_exam'] . "<br> Tersedia : " . $v['stock_of_exams']?></td>
                                <td><?=$v['start'] . ' - ' . $v['finish'] . "<br/><small>Metode : " . $timing = ($v['timing'] == 1) ? 'Durasi Per Mata Uji' : 'Durasi Per Butir Soal' . "</small>"?></td>
                                <td><?=$v['created_by'] . '<br><small>' . $v['created_at'] . '</small>'?></td>
                            </tr>
                            <?php endif;?>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>