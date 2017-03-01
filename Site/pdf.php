<?php
		
		
	
   $connect = mysqli_connect('localhost','root','')or die("ERROR");
            mysqli_select_db($connect,'agrurppe') or die("ERROR");
		/*** RECUPERATION DES DONNEES CLIENTs ***/
		//Requete sql des infos sur les client
		$sqlCli="SELECT * FROM client WHERE idClient=".$_GET['cli'];
		
  $req = mysqli_query($connect,$sqlCli) or die('Erreur SQL !<br />'.$sql3.'<br />'.mysqli_error($connect));
  $data = mysqli_fetch_array($req);
		
		/*** RECUPERATION DES DONNEES du lot ***/
		//Requete sql des infos sur le lot
		$sqlLot="SELECT * FROM lots WHERE numLots=".$_GET['lot'];

  $req = mysqli_query($connect,$sqlLot) or die('Erreur SQL !<br />'.$sql3.'<br />'.mysqli_error($connect));
  $data = mysqli_fetch_array($req);
		
		//on charge fpdf... la libraire pour generer des pdf
		require('fpdf/fpdf.php');
		 
		$pdf=new FPDF();
		$pdf->SetAutoPagebreak(True);
		$pdf->SetMargins(20,15,20);
		$pdf->AddPage();
		//on choisi la police et on met en gras et en police 16
		$pdf->SetFont('Times','B',14);
		$pdf->multicell(0,10,"FACTURE N°".$_GET['com'],1,'C',''); 
		$pdf->multicell(0,20,"",0,'L',''); 
		$pdf->SetFont('Times','',12);
		//num commande = num facture
		$pdf->multicell(0,10,"Numéro de facture : ".$_GET['com'],0,'L',''); 
		//données du client
		$pdf->multicell(0,5,"",0,'L',''); 
		$pdf->multicell(0,10,"Code Agrur du client : ".$_GET['cli'],0,'L',''); 
	
		//gestion du lot
		$pdf->multicell(0,5,"",0,'L',''); 
		$pdf->multicell(0,10,"Numéro du lot : ".$_GET['lot'],0,'L',''); 
	

		
		$pdf->Close();
		$pdf->Output('I');
		
?>