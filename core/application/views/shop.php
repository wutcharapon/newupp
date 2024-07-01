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
                <a href="<?=base_url('shop')?>">สินค้าจำหน่ายตัวแทน</a>
              </li>
            </ol>
        </div>
      <div class="card">
        <div class="card-body">

			<div class="row">
				<div class="col-12 mb-2">
				  <h3 class="button"><i class="feather-shopping-bag"></i> สินค้าจำหน่ายตัวแทน</h3>
				  <p>หากสนใจสั่งซื้อ กรุณาติดต่อส่วนงานจัดซื้อ 085-155-4440 หรือ 02-68-77777 ต่อ 1404</p>
				  <hr>
				</div>
			</div>

			<div id="accordion">
			  <div class="card">

          <!-- Shop Grid -->
          <div class="grid grid-gap-3 grid-col-1 grid-col-lg-3 mt-3">
<!--
            <div class="card card-product">
              <div class="card-body">
                <img class="card-img-top" src="<?=base_url('assets/img/products/bottle_2020.png')?>" alt="กระบอกน้ำ UPP">
                <p class="card-title">กระบอกน้ำ UPP</p>
                <div class="price"><span class="h5">ราคาใบละ 180 บาท</span></div>
                <div class="color-options">
                  <label class="custom-control custom-radio custom-radio-color custom-control-inline">
                    <input type="radio" name="bottle" class="custom-control-input" value="<?=base_url('assets/img/products/bottle_2020.png')?>" checked>
                    <span class="custom-control-label" style="border-radius: 5px; background-color: #132d50"></span>
                  </label>
                  <label class="custom-control custom-radio custom-radio-color custom-control-inline">
                    <input type="radio" name="bottle" class="custom-control-input" value="<?=base_url('assets/img/products/bottle1_2020.png')?>">
                    <span class="custom-control-label" style="background-color: #245b60"></span>
                  </label>
                  <label class="custom-control custom-radio custom-radio-color custom-control-inline">
                    <input type="radio" name="bottle" class="custom-control-input" value="<?=base_url('assets/img/products/bottle2_2020.png')?>">
                    <span class="custom-control-label" style="background-color: #c0c0c0"></span>
                  </label>
                  <label class="custom-control custom-radio custom-radio-color custom-control-inline">
                    <input type="radio" name="bottle" class="custom-control-input" value="<?=base_url('assets/img/products/bottle3_2020.png')?>">
                    <span class="custom-control-label" style="background-color: #83241e"></span>
                  </label>
                  <label class="custom-control custom-radio custom-radio-color custom-control-inline">
                    <input type="radio" name="bottle" class="custom-control-input" value="<?=base_url('assets/img/products/bottle4_2020.png')?>">
                    <span class="custom-control-label" style="background-color: #f8e9c2"></span>
                  </label>
                </div>
              </div>
            </div>
-->
            <div class="card card-product">
              <div class="card-body">
                <img class="card-img-top" src="<?=base_url('assets/img/products/sunshade.jpg')?>" alt="ม่านบังแดดรถยนต์ ">
                <p class="card-title">ม่านบังแดดรถยนต์ </p>
                <div class="price"><span class="h5">ราคาอันละ 180 บาท</span></div>
              </div>
            </div>

            <div class="card card-product">
              <div class="card-body">
                <img class="card-img-top" src="<?=base_url('assets/img/products/bag1_2022.jpg')?>" alt="กระเป๋าผ้า">
                <p class="card-title">กระเป๋าผ้า</p>
                <div class="price"><span class="h5">ราคาใบละ 100 บาท</span></div>
                <div class="color-options">
                  <label class="custom-control custom-radio custom-radio-color custom-control-inline">
                    <input type="radio" name="bag" class="custom-control-input" value="<?=base_url('assets/img/products/bag1_2022.jpg')?>" checked>
                    <span class="custom-control-label" style="background-color: #132d50"></span>
                  </label>
                  <label class="custom-control custom-radio custom-radio-color custom-control-inline">
                    <input type="radio" name="bag" class="custom-control-input" value="<?=base_url('assets/img/products/bag2_2022.jpg')?>">
                    <span class="custom-control-label" style="background-color: #132d50"></span>
                  </label>
                </div>
              </div>
            </div>

          </div>
          <!-- /Shop Grid -->

			  </div>

			</div>

        </div>
      </div>
    </div>
