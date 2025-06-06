<?php
session_start();
require("config.php");
////code
 
if(!isset($_SESSION['auser']))
{
	header("location:index.php");
}

//// code insert
//// add code
$error="";
$msg="";
if(isset($_POST['add']))
{
	
	$title=$_POST['title'];
	$content=$_POST['content'];
	$ptype=$_POST['ptype'];
	$bhk=$_POST['bhk'];
	$bed=$_POST['bed'];
	$balc=$_POST['balc'];
	$hall=$_POST['hall'];
	$stype=$_POST['stype'];
	$bath=$_POST['bath'];
	$kitc=$_POST['kitc'];
	$floor=$_POST['floor'];
	$price=$_POST['price'];
	$city=$_POST['city'];
	$asize=$_POST['asize'];
	$loc=$_POST['loc'];
	$state=$_POST['state'];
	$status=$_POST['status'];
	$uid=$_POST['uid'];
	$feature=$_POST['feature'];
	
	$totalfloor=$_POST['totalfl'];
	
	$aimage=$_FILES['aimage']['name'];
	$aimage1=$_FILES['aimage1']['name'];
	$aimage2=$_FILES['aimage2']['name'];
	$aimage3=$_FILES['aimage3']['name'];
	$aimage4=$_FILES['aimage4']['name'];
	
	$fimage=$_FILES['fimage']['name'];
	$fimage1=$_FILES['fimage1']['name'];
	$fimage2=$_FILES['fimage2']['name'];

	$isFeatured=$_POST['isFeatured'];
	
	$temp_name  =$_FILES['aimage']['tmp_name'];
	$temp_name1 =$_FILES['aimage1']['tmp_name'];
	$temp_name2 =$_FILES['aimage2']['tmp_name'];
	$temp_name3 =$_FILES['aimage3']['tmp_name'];
	$temp_name4 =$_FILES['aimage4']['tmp_name'];
	
	$temp_name5 =$_FILES['fimage']['tmp_name'];
	$temp_name6 =$_FILES['fimage1']['tmp_name'];
	$temp_name7 =$_FILES['fimage2']['tmp_name'];
	
	move_uploaded_file($temp_name,"property/$aimage");
	move_uploaded_file($temp_name1,"property/$aimage1");
	move_uploaded_file($temp_name2,"property/$aimage2");
	move_uploaded_file($temp_name3,"property/$aimage3");
	move_uploaded_file($temp_name4,"property/$aimage4");
	
	move_uploaded_file($temp_name5,"property/$fimage");
	move_uploaded_file($temp_name6,"property/$fimage1");
	move_uploaded_file($temp_name7,"property/$fimage2");
	
	$sql="INSERT INTO property (title,pcontent,type,bhk,stype,bedroom,bathroom,balcony,kitchen,hall,floor,size,price,location,city,state,feature,pimage,pimage1,pimage2,pimage3,pimage4,uid,status,mapimage,topmapimage,groundmapimage,totalfloor,isFeatured)
	VALUES('$title','$content','$ptype','$bhk','$stype','$bed','$bath','$balc','$kitc','$hall','$floor','$asize','$price',
	'$loc','$city','$state','$feature','$aimage','$aimage1','$aimage2','$aimage3','$aimage4','$uid','$status','$fimage','$fimage1','$fimage2','$totalfloor','$isFeatured')";
	$result=mysqli_query($con,$sql);
	if($result)
		{
			$msg="<p class='alert alert-success'>Property Inserted Successfully</p>";
					
		}
		else
		{
			$error="<p class='alert alert-warning'>Something went wrong. Please try again</p>";
		}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>LM HOMES | Property</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
		
		<!-- Feathericon CSS -->
        <link rel="stylesheet" href="assets/css/feathericon.min.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
		
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
    <body>

		
			<!-- Header -->
			<?php include("header.php"); ?>
			<!-- /Sidebar -->
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">ملكية</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="dashboard.php">لوحة التحكم</a></li>
									<li class="breadcrumb-item active">ملكية</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">إضافة تفاصيل العقار</h4>
								</div>
								<form method="post" enctype="multipart/form-data">
								<div class="card-body">
									<h5 class="card-title">تفاصيل العقار</h5>
									<?php echo $error; ?>
									<?php echo $msg; ?>
									
										<div class="row">
											<div class="col-xl-12">
												<div class="form-group row">
													<label class="col-lg-2 col-form-label">العنوان</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="title" required placeholder="ادخل العنوان">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-2 col-form-label">المحتوى</label>
													<div class="col-lg-9">
														<textarea class="tinymce form-control" name="content" rows="10" cols="30"></textarea>
													</div>
												</div>
												
											</div>
											<div class="col-xl-6">
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">نوع العقار</label>
													<div class="col-lg-9">
														<select class="form-control" required name="ptype">
															<option value="">حدد نوع</option>
															<option value="apartment">شقة</option>
															<option value="flat">مستوي</option>
															<option value="building">مبنى</option>
															<option value="house">منزل</option>
															<option value="villa">فيلا</option>
															<option value="office">مكتب</option>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">نوع البيع</label>
													<div class="col-lg-9">
														<select class="form-control" required name="stype">
															<option value="">حدد الحالة</option>
															<option value="rent">إجار</option>
															<option value="sale">بيع</option>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">الحمام</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="bath" required placeholder="ادخل الحمام (فقط من 1 إلى 10)">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">المطبخ</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="kitc" required placeholder="ادخل المطبخ (فقط من 1 إلى 10)">
													</div>
												</div>
												
											</div>   
											<div class="col-xl-6">
												<div class="form-group row mb-3">
													<label class="col-lg-3 col-form-label">غرفة نوم وحمام</label>
													<div class="col-lg-9">
														<select class="form-control" required name="bhk">
															<option value="">حدد غرفة نوم وحمام</option>
															<option value="1 BHK">1 BHK</option>
															<option value="2 BHK">2 BHK</option>
															<option value="3 BHK">3 BHK</option>
															<option value="4 BHK">4 BHK</option>
															<option value="5 BHK">5 BHK</option>
															<option value="1,2 BHK">1,2 BHK</option>
															<option value="2,3 BHK">2,3 BHK</option>
															<option value="2,3,4 BHK">2,3,4 BHK</option>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">غرفة نوم</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="bed" required placeholder="ادخل غرفة نوم (فقط من 1 إلى 10)">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">الشرفة</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="balc" required placeholder="ادخل الشرفة (فقط من 1 إلى 10)">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">الصالة</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="hall" required placeholder="ادخل الصالة (فقط من 1 إلى 10)">
													</div>
												</div>
												
											</div>
										</div>
										<h4 class="card-title">السعر & الموقع</h4>
										<div class="row">
											<div class="col-xl-6">
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">الدور</label>
													<div class="col-lg-9">
														<select class="form-control" required name="floor">
															<option value="">حدد الدور</option>
															<option value="1st Floor">الدور الاول</option>
															<option value="2nd Floor">الدور الثاني</option>
															<option value="3rd Floor">الدور الثالث</option>
															<option value="4th Floor">الدور الرابع</option>
															<option value="5th Floor">الدور الخامس</option>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">السعر</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="price" required placeholder="ادخل السعر">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">المديرية</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="city" required placeholder="ادخل المديرية">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">المحافظة</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="state" required placeholder="ادخل المحافظة">
													</div>
												</div>
											</div>
											<div class="col-xl-6">
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">عدد الادوار</label>
													<div class="col-lg-9">
														<select class="form-control" required name="totalfl">
															<option value="">حدد الادوار</option>
															<option value="1 Floor">دور</option>
															<option value="2 Floor">دورين</option>
															<option value="3 Floor">3 ادوار</option>
															<option value="4 Floor">4 ادوار</option>
															<option value="5 Floor">5 ادوار</option>
															<option value="6 Floor">6 ادوار</option>
															<option value="7 Floor">7 ادوار</option>
															<option value="8 Floor">8 ادوار</option>
															<option value="9 Floor">9 ادوار</option>
															<option value="10 Floor">10 ادوار</option>
															<option value="11 Floor">11 دور</option>
															<option value="12 Floor">12 دور</option>
															<option value="13 Floor">13 دور</option>
															<option value="14 Floor">14 دور</option>
															<option value="15 Floor">15 دور</option>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">حجم المنطقة</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="asize" required placeholder="أدخل مساحة المنطقة (بالمتر المربع)">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">العنوان</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="loc" required placeholder="أدخل العنوان">
													</div>
												</div>
												
											</div>
										</div>
										
										<div class="form-group row">
											<label class="col-lg-2 col-form-label">الميزة</label>
											<div class="col-lg-9">
											<p class="alert alert-danger">* هام يرجى عدم إزالة المحتوى أدناه فقط للتغيير <b>نعم</b> أو <b>لا</b> أو إضافة المزيد من التفاصيل</p>
											
											<textarea class="tinymce form-control" name="feature" rows="10" cols="30">
												<!---feature area start--->
												<div class="col-md-4">
														<ul>
														<li class="mb-3"><span class="text-secondary font-weight-bold">عمر العقار : </span>10 سنوات</li>
														<li class="mb-3"><span class="text-secondary font-weight-bold">حمام سباحة : </span>نعم</li>
														<li class="mb-3"><span class="text-secondary font-weight-bold">موقف السيارات : </span>نعم</li>
														<li class="mb-3"><span class="text-secondary font-weight-bold">صالة الألعاب الرياضية : </span>نعم</li>
														</ul>
													</div>
													<div class="col-md-4">
														<ul>
														<li class="mb-3"><span class="text-secondary font-weight-bold">النوع : </span>شقة</li>
														<li class="mb-3"><span class="text-secondary font-weight-bold">الأمن : </span>نعم</li>
														<li class="mb-3"><span class="text-secondary font-weight-bold">سعة تناول الطعام : </span>10 أشخاص</li>
														<li class="mb-3"><span class="text-secondary font-weight-bold">المصلى  : </span>لا</li>
														
														</ul>
													</div>
													<div class="col-md-4">
														<ul>
														<li class="mb-3"><span class="text-secondary font-weight-bold">الطرف الثالث : </span>لا</li>
														<li class="mb-3"><span class="text-secondary font-weight-bold">المصعد : </span>نعم</li>
														<li class="mb-3"><span class="text-secondary font-weight-bold">كاميرات مراقبة : </span>نعم</li>
														<li class="mb-3"><span class="text-secondary font-weight-bold">إمدادات المياه : </span>مشروع / خزان</li>
														</ul>
													</div>
												<!---feature area end---->
											</textarea>
											</div>
										</div>
												
										<h4 class="card-title">الصورة والحالة</h4>
										<div class="row">
											<div class="col-xl-6">
												
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">الصورة</label>
													<div class="col-lg-9">
														<input class="form-control" name="aimage" type="file" required="">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">الصورة 2</label>
													<div class="col-lg-9">
														<input class="form-control" name="aimage2" type="file" required="">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">الصورة 4</label>
													<div class="col-lg-9">
														<input class="form-control" name="aimage4" type="file" required="">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">الحالة</label>
													<div class="col-lg-9">
														<select class="form-control"  required name="status">
															<option value="">حدد الحالة</option>
															<option value="available">متاح</option>
															<option value="sold out">نفذ</option>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">صورة مخطط الطابق السفلي</label>
													<div class="col-lg-9">
														<input class="form-control" name="fimage1" type="file">
													</div>
												</div>
											</div>
											<div class="col-xl-6">
												
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">صورة 2</label>
													<div class="col-lg-9">
														<input class="form-control" name="aimage1" type="file" required="">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">صورة 3</label>
													<div class="col-lg-9">
														<input class="form-control" name="aimage3" type="file" required="">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">معرف المستخدم</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="uid" required placeholder="أدخل معرف المستخدم (رقم فقط)">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">صورة مخطط الطابق</label>
													<div class="col-lg-9">
														<input class="form-control" name="fimage" type="file">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">صورة مخطط الطابق الأرضي</label>
													<div class="col-lg-9">
														<input class="form-control" name="fimage2" type="file">
													</div>
												</div>
											</div>
										</div>

										<hr>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-lg-3 col-form-label"><b>هل هو مميز؟</b></label>
													<div class="col-lg-9">
														<select class="form-control"  required name="isFeatured">
															<option value="">حدد...</option>
															<option value="0">لا</option>
															<option value="1">نعم</option>
														</select>
													</div>
												</div>
											</div>
										</div>

										
											<input type="submit" value="ارسال" class="btn btn-primary"name="add" style="margin-left:200px;">
										
								</div>
								</form>
							</div>
						</div>
					</div>
				
				</div>			
			</div>
			<!-- /Main Wrapper -->

		
		<!-- jQuery -->
        <script src="assets/js/jquery-3.2.1.min.js"></script>
		<script src="assets/plugins/tinymce/tinymce.min.js"></script>
		<script src="assets/plugins/tinymce/init-tinymce.min.js"></script>
		<!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Slimscroll JS -->
        <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		
		<!-- Custom JS -->
		<script  src="assets/js/script.js"></script>
		
    </body>

</html>