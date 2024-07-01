  <div class="content-wrapper">
    <section class="content-header">
      <h1>ข่าวและบทความ</h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url('uppcp/news')?>"><i class="fa fa-dashboard"></i> ข่าวและบทความ</a></li>
        <li class="active"><?=isset($news['title']) ? "แก้ไข" : "เพิ่ม" ?></li>
      </ol>
    </section>

    <section class="content">

	<div class="row">
		<div class="col-md-12">
          <!-- Application buttons -->
          <div class="box box-primary">
            <div class="box-header with-border">
				<h3 class="box-title"><?=isset($news['title']) ? "<button type=\"button\" class=\"btn btn-warning\">แก้ไข</button>" : "<button type=\"button\" class=\"btn btn-success\">เพิ่ม</button>" ?></h3>
            </div>
            <!-- /.box-header -->
			<form role="form" method="post" enctype="multipart/form-data">
              <div class="box-body">
				  <div class="col-lg-12 col-xs-12">
					<div class="form-group">
					  <label>ชื่อหัวข้อ</label>
					  <input type="text" name="title" class="form-control" placeholder="ชื่อหัวข้อ" value="<?=isset($news['title']) ? $news['title'] : "" ?>">
					</div>
				  </div>
				  <div class="col-lg-12 col-xs-12">
					<div class="form-group">
					  <label>ข้อความโดยย่อ</label>
					  <input type="text" name="subtitle" class="form-control" placeholder="ข้อความโดยย่อ" value="<?=isset($news['subtitle']) ? $news['subtitle'] : "" ?>">
					</div>
				  </div>
				  <div class="col-lg-12 col-xs-12">
					<div class="form-group">
					  <label>รายละเอียด</label>
						<textarea id="editor" name="description" rows="10" cols="80">
							<?=isset($news['description']) ? $news['description'] : "รายละเอียด" ?>
						</textarea>
					</div>
				  </div>
				  <div class="col-lg-12 col-xs-12">
					<div class="form-group">
					  <label>รูปหน้าปก</label>
					  <input type="file" name="image" class="form-control">
					</div>
				  </div>

				  <div class="col-lg-12 col-xs-12">
					<div class="form-group">
					  <label>ชื่อโฟร์เดอร์รูปใน uploads/post เฉพาะรูปที่นามสกุล jpg,png,gif เท่านั้น </label>
					  <input type="type" name="gallery" class="form-control" value="<?=isset($news['gallery']) ? $news['gallery'] : "" ?>">
					</div>
				  </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">บันทึก</button>
              </div>
            </form>

          </div>
          <!-- /.box -->
        </div>

      </div>
    </section>

  </div>

