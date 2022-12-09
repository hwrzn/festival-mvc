
-- Certains établissements sont fictifs
DELETE from Etablissement;
insert into Etablissement values ('0350785N', 'College de Moka', '2 avenue Aristide Briand BP 6', '35401', 'Saint-Malo', '0299206990', null,1,'M.','Dupont','Alain',20);
insert into Etablissement values ('0350123A', 'College Lamartine', '3, avenue des corsaires', '35404', 'Parame', '0299561459', null, 1,'Mme','Lefort','Anne',58);  
insert into Etablissement values ('0351234W', 'College Leonard de Vinci', '2 rue Rabelais', '35418', 'Saint-Malo', '0299117474', null, 1,'M.','Durand','Pierre',60);   
insert into Etablissement values ('11111111', 'Centre de rencontres internationales', '37 avenue du R.P. Umbricht BP 108', '35407', 'Saint-Malo', '0299000000', null, 0, 'M.','Guenroc','Guy',200);

-- Certains groupes sont incomplètement renseignés
DELETE from Groupe;
insert into Groupe values ('g001','Ligue Football',40,'France','O');
insert into Groupe values ('g002','Ligue Basketball',25,'France','O');
insert into Groupe values ('g003','Ligue Escrime',34,'France','O');
insert into Groupe values ('g004','Ligue Babyfoot',38,'France','O');
insert into Groupe values ('g005','Ligue Tennis de table',10,'France','O');
insert into Groupe values ('g006','Ligue Handball',29,'France','O');
insert into Groupe values ('g007','Ligue Tennis',19,'France','O');
insert into Groupe values ('g008','Ligue Rugby',5,'France','O');


-- Les attributions sont fictives
DELETE from Attribution;
insert into Attribution values ('0350785N', 'g001', 11);
insert into Attribution values ('0350785N', 'g002', 9);
insert into Attribution values ('0350123A', 'g004', 13);
insert into Attribution values ('0350123A', 'g005', 8);
insert into Attribution values ('0351234W', 'g001', 3);
insert into Attribution values ('0351234W', 'g006', 10);
insert into Attribution values ('0351234W', 'g007', 7);



 

