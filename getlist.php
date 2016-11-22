<?php
	$datadir = "GeoTIFF";
	date_default_timezone_set("UTC");
	$tpinfo = strval($_GET['info']);
	$wktrg = strval($_GET['wkt']);
	$interval = strval($_GET['intvl']);
	$intl = preg_replace("/[^0-9]/","",$interval);
	$produk = "produkRFR.png";
	if($tpinfo[0]=="R"){
		$produk = "produkRFR.png";
	}
	else if($tpinfo[0]=="C"){
		$produk = "produkCTT.png";
	}
	else if($tpinfo[0]=="S"){
		$produk = "produkSST.png";
	}
	$addintl = new DateInterval('PT00H'.$intl.'M');
	if(strlen($wktrg>9)){
		$frmdt = explode("-",$wktrg)[0].' 00:00';
		$todt = explode("-",$wktrg)[1].' 24:00';
		$stdt = DateTime::createFromFormat('Y/m/d H:i', $frmdt);
		$endt = DateTime::createFromFormat('Y/m/d H:i', $todt);
		$dfr = $stdt->diff($endt);
		$tmp1 = ($dfr->format('%i'))+(($dfr->format('%H'))*60)+(($dfr->format('%d'))*1440);
		$nint = $tmp1/$intl;
		$x = 0;
		while($x < $nint){
			$tmp = $stdt->format('Y-m-d H-i');
			$spl = explode(" ",$tmp);
			$flpath = $datadir.'/'.$spl[0].'/'.$spl[1].'/'.$produk;
			if(file_exists($flpath)){
				$tmp2 = $spl[0].'/'.$spl[1].'/'.$produk;
				echo $tmp2.'^';
			}
			$stdt = $stdt->add($addintl);
			$x += 1;
		}
	}
	else{
		$ctm = new DateTime();
		$hrmin = preg_replace("/[^0-9]/","",$wktrg);
		$tosub = new DateInterval('PT'.$hrmin.'H00M');
		$rqtm = $ctm->sub($tosub);	
		$reqtm = $rqtm->format('Y-m-d H:i');
		$cmin = floatval(substr($reqtm, -2));
		$nmin = ceil($cmin/10)*10;
		$dmin = $nmin-$cmin;
		$addmn = new DateInterval('PT00H'.$dmin.'M');
		$stm = $rqtm->add($addmn);
		$mxd = (intval($hrmin)*60)/intval($intl);
		$x = 0;
		while($x < $mxd){
			$tmp = $stm->format('Y-m-d H-i');
			$spl = explode(" ",$tmp);
			$flpath = $datadir.'/'.$spl[0].'/'.$spl[1].'/'.$produk;
			if(file_exists($flpath)){
				$tmp2 = $spl[0].'/'.$spl[1].'/'.$produk;
				echo $tmp2.'^';
			}
			$stm = $stm->add($addintl);
			$x += 1;
		}
	}
?>