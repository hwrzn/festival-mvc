
-- Certains établissements sont fictifs
DELETE from Etablissement;
insert into Etablissement 
values ('0350785N', 'College de Moka', '2 avenue Aristide Briand BP 6', '35401', 'Saint-Malo', '0299206990', null,1,'M.','Dupont','Alain',20);
insert into Etablissement 
values ('0350123A', 'College Lamartine', '3, avenue des corsaires', '35404', 'Parame', '0299561459', null, 1,'Mme','Lefort','Anne',58);  
insert into Etablissement
values ('0351234W', 'College Leonard de Vinci', '2 rue Rabelais', '35418', 'Saint-Malo', '0299117474', null, 1,'M.','Durand','Pierre',60);   
insert into Etablissement 
values ('11111111', 'Centre de rencontres internationales', '37 avenue du R.P. Umbricht BP 108', '35407', 'Saint-Malo', '0299000000', null, 0, 'M.','Guenroc','Guy',200);

-- Certains groupes sont incomplètement renseignés
DELETE from Groupe;
insert into Groupe 
values ('g001','Groupe folklorique du Bachkortostan',40,'Bachkirie','O');
insert into Groupe 
values ('g002','Marina Prudencio Chavez',25,'Bolivie','O');
insert into Groupe 
values ('g003','Nangola Bahia de Salvador',34,'Bresil','O');
insert into Groupe 
values ('g004','Bizone de Kawarma',38,'Bulgarie','O');
insert into Groupe 
values ('g005','Groupe folklorique camerounais',22,'Cameroun','O');
insert into Groupe 
values ('g006','Syoung Yaru Mask Dance Group',29,'Coree du Sud','O');
insert into Groupe 
values ('g007','Pipe Band',19,'Ecosse','O');
insert into Groupe 
values ('g008','Aira da Pedra',5,'Espagne','O');
insert into Groupe 
values ('g009','The Jersey Caledonian Pipe Band',21,'Jersey','O');
insert into Groupe 
values ('g010','Groupe folklorique des Emirats',30,'Emirats arabes unis','O');
insert into Groupe 
values ('g011','Groupe folklorique mexicain',38,'Mexique','O');
insert into Groupe 
values ('g012','Groupe folklorique de Panama',22,'Panama','O');
insert into Groupe 
values ('g013','Groupe folklorique papou',13,'Papouasie','O');
insert into Groupe 
values ('g014','Paraguay Ete',26,'Paraguay','O');
insert into Groupe 
values ('g015','La Tuque Bleue',8,'Quebec','O');
insert into Groupe 
values ('g016','Ensemble Leissen de Oufa',40,'Republique de Bachkirie','O');
insert into Groupe 
values ('g017','Groupe folklorique turc',40,'Turquie','O');
insert into Groupe 
values ('g018','Groupe folklorique russe',43,'Russie','O');
insert into Groupe 
values ('g019','Ruhunu Ballet du village de Kosgoda',27,'Sri Lanka','O');
insert into Groupe 
values ('g020','L''Alen',34,'France  Provence','O');
insert into Groupe 
values ('g021','L''escolo Di Tourre',40,'France  Provence','O');
insert into Groupe 
values ('g022','Deloubes Kevin',1,'France  Bretagne','O');
insert into Groupe 
values ('g023','Daonie See',5,'France  Bretagne','O');
insert into Groupe 
values ('g024','Boxty',5,'France  Bretagne','O');
insert into Groupe 
values ('g025','Soeurs Chauvel',2,'France  Bretagne','O');
insert into Groupe 
values ('g026','Cercle Gwik Alet',0,'France  Bretagne','N');
insert into Groupe 
values ('g027','Bagad Quic En Groigne',0,'France  Bretagne','N');
insert into Groupe 
values ('g028','Penn Treuz',0,'France  Bretagne','N');
insert into Groupe 
values ('g029','Savidan Launay',0,'France  Bretagne','N');
insert into Groupe 
values ('g030','Cercle Boked Er Lann',0,'France  Bretagne','N');
insert into Groupe 
values ('g031','Bagad Montfortais',0,'France  Bretagne','N');
insert into Groupe 
values ('g032','Vent de Noroise',0,'France  Bretagne','N');
insert into Groupe  
values ('g033','Cercle Strollad',0,'France  Bretagne','N');
insert into Groupe 
values ('g034','Bagad An Hanternoz',0,'France  Bretagne','N');
insert into Groupe
values ('g035','Cercle Ar Vro Melenig',0,'France  Bretagne','N');
insert into Groupe 
values ('g036','Cercle An Abadenn Nevez',0,'France  Bretagne','N');
insert into Groupe 
values ('g037','Kerc''h Keltiek Roazhon',0,'France  Bretagne','N');
insert into Groupe 
values ('g038','Bagad Plougastel',0,'France  Bretagne','N');
insert into Groupe 
values ('g039','Bagad Nozeganed Bro Porh-Loeiz',0,'France  Bretagne','N');
insert into Groupe 
values ('g040','Bagad Nozeganed Bro Porh-Loeiz',0,'France  Bretagne','N');
insert into Groupe 
values ('g041','Jackie Molard Quartet',0,'France  Bretagne','N');
insert into Groupe 
values ('g042','Deomp',0,'France  Bretagne','N');
insert into Groupe  
values ('g043','Cercle Olivier de Clisson',0,'France  Bretagne','N');
insert into Groupe  
values ('g044','Kan Tri',0,'France  Bretagne','N');

-- Les attributions sont fictives
DELETE from Attribution;
insert into Attribution 
values ('0350785N', 'g001', 11);
insert into Attribution 
values ('0350785N', 'g002', 9);

insert into Attribution 
values ('0350123A', 'g004', 13);
insert into Attribution 
values ('0350123A', 'g005', 8);

insert into Attribution 
values ('0351234W', 'g001', 3);
insert into Attribution 
values ('0351234W', 'g006', 10);
insert into Attribution 
values ('0351234W', 'g007', 7);



 

