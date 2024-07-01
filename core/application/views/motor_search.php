<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <div class="container my-3">
		<div class="breadcrumb-wrapper">
            <ol class="breadcrumb">
              <li>
                <a href="<?=base_url()?>">หน้าหลัก</a>
              </li>
              <li>
                <a href="#">ประกันรถยนต์</a>
              </li>
            </ol>
        </div>

      <div class="card">
        <div class="card-body">

          <div class="row">
			<div class="col-12 mb-2">
              <h3 class="button"><i class="feather-search"></i> ค้นหาประกันภัยรถยนต์</h3>
			  <hr>
            </div>

            <div class="col-md-8 offset-sm-2 mb-3 mb-md-0">
              <form class="form-style-1" action='<?=base_url('products/search')?>' method="POST">
                <div class="form-row">
                  <div class="form-group col-sm-12 col-md-6">
                    <label>ประเภท</label>
                    <select class="form-control custom-select" id="insutype" name="insutype">
                      <option value="">เลือก</option>
                      <option value="1">ประกันภัยรถยนต์ ชั้น 1</option>
                      <option value="2">ประกันภัยรถยนต์ ชั้น 2</option>
                      <option value="3">ประกันภัยรถยนต์ ชั้น 3</option>
                      <option value="5">ประกันภัยรถยนต์ ชั้น 5</option>
                    </select>
                  </div>
                  <div class="form-group col-sm-12 col-md-6">
                    <label>ปีรถยนต์</label>
                    <select class="form-control custom-select" id="year" name="year" disabled>
                      <option value="">เลือก</option>
                    </select>
                  </div>
                  <div class="form-group col-sm-12 col-md-6">
                    <label>รถยนต์</label>
                    <select class="form-control custom-select" id="maker" name="maker" disabled>
                      <option value="">เลือก</option>
                    </select>
                  </div>
                  <div class="form-group col-sm-12 col-md-6">
                    <label>รุ่น</label>
                    <select class="form-control custom-select" id="model" name="model" disabled>
                      <option value="">เลือก</option>
                    </select>
                  </div>
                  <div class="form-group col-sm-12 col-md-6">
                    <label>รุ่นย่อย</label>
                    <select class="form-control custom-select" id="engdesc" name="engdesc" disabled>
                      <option value="">เลือก</option>
                    </select>
                  </div>
                  <div class="form-group col-sm-12 col-md-6">
                    <label>น้ำหนักบรรทุก</label>
                    <select class="form-control custom-select" id="sizeno" name="sizeno" disabled>
                      <option value="">เลือก</option>
                    </select>
                  </div>
				  <div class="form-group col-md-4 offset-md-4 my-3">
					<button type="submit" class="btn btn-primary btn-block rounded-pill"><i class="feather-search"></i> ค้นหา</button>
				  </div>
                </div>

              </form>
            </div>
          </div>

		 </div>
		</div>

	</div>