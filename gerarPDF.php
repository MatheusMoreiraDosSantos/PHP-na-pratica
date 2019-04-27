<?php
include 'conexao.php';
include 'fpdf/fpdf.php'; 

	$provapost = $_POST['provaid']; //pega valor por post
	$prova = intval($provapost);	//converte para int

	//query dos dados que serao impressos no pdf
	$querytabela = "select juiznome, conjunto.cavaleiro, conjunto.draw ,conjunto.animal, prova.provanome, prova.provacategoria, manobra1,manobra2,
                manobra3, manobra4, manobra5, manobra6, manobra7, manobra8, penalidade1, penalidade2,
                penalidade3, penalidade4, penalidade5, penalidade6, penalidade7, penalidade8, total from notas 
                inner join juiznota on notas.notasid=juiznota.notasid 
                inner join usuario on usuario.usuarioid=juiznota.usuarioid 
                inner join conjunto on juiznota.conjuntoid = conjunto.conjuntoid
                inner join prova on prova.provaid = conjunto.provaid
                where prova.provaid = '$prova' order by draw;";

                //executa a query 
                 $resultadotabela = mysqli_query($conexao,$querytabela) 
                 or die(mysqli_error($conexao)); 
                 

                 //edicoes no documento 
                 $pdf = new FPDF('L');
                 $pdf->AddPage();
                 $pdf->SetFont('Arial','',9); // font e tamanho
                 $pdf->SetLeftMargin(4);	  //edicao na margin a esquerda

                 $pdf->cell(190,10,'Notas',0,0,"c"); // define o tamanho da celula
                 $pdf->Ln(15); // quebra de linha
                 
                 $pdf->SetTextColor(0,115,37); // define a cor do text
				 $pdf->cell(190,10,'M1 = Primeira Manobra',0,0,"c");
				 $pdf->Ln(15);
				 $pdf->SetTextColor(102,0,13);
				 $pdf->cell(190,10,'P1 = Primeira Penalidade',0,0,"c");
				 $pdf->Ln(15);
				 $pdf->SetTextColor(0,0,0);

				 //cabeçalho da tabela
				 $pdf->Ln(15);
				 $pdf->Cell(30,7,"Juiz",1,0,"c");       
				 $pdf->Cell(40,7,"Cavaleiro",1,0,"c");
				 $pdf->Cell(40,7,"Animal",1,0,"c");
				 $pdf->Cell(15,7,"Prova",1,0,"c");
				 $pdf->Cell(25,7,"Categoria",1,0,"c");

				 $pdf->Cell(8,7,"M1",1,0,"c");
				 $pdf->Cell(8,7,"M2",1,0,"c");
				 $pdf->Cell(8,7,"M3",1,0,"c");
				 $pdf->Cell(8,7,"M4",1,0,"c");
				 $pdf->Cell(8,7,"M5",1,0,"c");
				 $pdf->Cell(8,7,"M6",1,0,"c");
				 $pdf->Cell(8,7,"M7",1,0,"c");
				 $pdf->Cell(8,7,"M8",1,0,"c");
				 $pdf->Cell(8,7,"P1",1,0,"c");
				 $pdf->Cell(8,7,"P2",1,0,"c");
				 $pdf->Cell(8,7,"P3",1,0,"c");
				 $pdf->Cell(8,7,"P4",1,0,"c");
				 $pdf->Cell(8,7,"P5",1,0,"c");
				 $pdf->Cell(8,7,"P6",1,0,"c");
				 $pdf->Cell(8,7,"P7",1,0,"c");
				 $pdf->Cell(8,7,"P8",1,0,"c");
				 $pdf->Cell(9,7,"Total",1,0,"c");
				 $pdf->Ln();

				 //loop responsavel por inserir valores na table
				 while ($dados = mysqli_fetch_assoc($resultadotabela)) {
				 $pdf->Cell(30,7, $dados['juiznome'],1,0,"c");
				 $pdf->Cell(40,7,$dados['cavaleiro'],1,0,"c");
				 $pdf->Cell(40,7,$dados['animal'],1,0,"c");
				 $pdf->Cell(15,7,$dados['provanome'],1,0,"c");
				 $pdf->Cell(25,7,$dados['provacategoria'],1,0,"c");
				 $pdf->SetTextColor(0,115,37);
				 $pdf->Cell(8,7,$dados['manobra1'],1,0,"c");
				 $pdf->Cell(8,7,$dados['manobra2'],1,0,"c");
				 $pdf->Cell(8,7,$dados['manobra3'],1,0,"c");
				 $pdf->Cell(8,7,$dados['manobra4'],1,0,"c");
				 $pdf->Cell(8,7,$dados['manobra5'],1,0,"c");
				 $pdf->Cell(8,7,$dados['manobra6'],1,0,"c");
				 $pdf->Cell(8,7,$dados['manobra7'],1,0,"c");
				 $pdf->Cell(8,7,$dados['manobra8'],1,0,"c");
				 $pdf->SetTextColor(102,0,13);
				 $pdf->Cell(8,7,$dados['penalidade1'],1,0,"c");
				 $pdf->Cell(8,7,$dados['penalidade2'],1,0,"c");
				 $pdf->Cell(8,7,$dados['penalidade3'],1,0,"c");
				 $pdf->Cell(8,7,$dados['penalidade4'],1,0,"c");
				 $pdf->Cell(8,7,$dados['penalidade5'],1,0,"c");
				 $pdf->Cell(8,7,$dados['penalidade6'],1,0,"c");
				 $pdf->Cell(8,7,$dados['penalidade7'],1,0,"c");
				 $pdf->Cell(8,7,$dados['penalidade8'],1,0,"c");
  				 $pdf->SetTextColor(0,0,0);
  				 $pdf->Cell(9,7,$dados['total'],1,0,"c");
				 $pdf->Ln();
	
				 }
				 //show document
				 $pdf->Output();


?>