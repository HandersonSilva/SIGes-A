#instituição------------------------------------------------------------------------------------
insert into instituicaos (SGA_instituicao_nomeFantasia,SGA_instituicao_cnpj,SGA_instituicao_telfixo,SGA_instituicao_celular,SGA_instituicao_email) 
values('ProTec',12345678910111,32324040,32324040,'protec@protec.com');
insert into instituicaos (SGA_instituicao_nomeFantasia,SGA_instituicao_cnpj,SGA_instituicao_telfixo,SGA_instituicao_celular,SGA_instituicao_email) 
values('TecInfo',12345678910111,32324040,32324040,'tecinfo@tecinfo.com');
insert into instituicaos (SGA_instituicao_nomeFantasia,SGA_instituicao_cnpj,SGA_instituicao_telfixo,SGA_instituicao_celular,SGA_instituicao_email) 
values('SaudEnfe',12345678910111,32324040,32324040,'saudenf@saudenf.com');

select *from instituicaos;

#admin_instituicaos------------------------------------------------------------------------------------------
insert into admin_instituicaos (fk_instituicao_id,SGA_admin_instituicao_nome,SGA_admin_instituicao_email,SGA_admin_instituicao_pass)
values(1,'SGA','sga@sga.com','sga12312');
select *from admin_instituicaos;

#cursos-------------------------------------------------------------------------------------------------
#ProTec
insert into cursos(fk_instituicao_id,SGA_cursos_nome,SGA_cursos_duracao)
values(1,'Manutenção de computadores','6 meses');
insert into cursos(fk_instituicao_id,SGA_cursos_nome,SGA_cursos_duracao)
values(1,'Programação','6 meses');
insert into cursos(fk_instituicao_id,SGA_cursos_nome,SGA_cursos_duracao)
values(1,'Curso php ','6 meses');

#TecInfo
insert into cursos(fk_instituicao_id,SGA_cursos_nome,SGA_cursos_duracao)
values(2,'Manutenção de Notebook','6 meses');
insert into cursos(fk_instituicao_id,SGA_cursos_nome,SGA_cursos_duracao)
values(2,'Redes de computadores','6 meses');
insert into cursos(fk_instituicao_id,SGA_cursos_nome,SGA_cursos_duracao)
values(2,'Informatica basica','6 meses');

#SaudEnfe
insert into cursos(fk_instituicao_id,SGA_cursos_nome,SGA_cursos_duracao)
values(3,'Tecnico em enfermagem','18 meses');
insert into cursos(fk_instituicao_id,SGA_cursos_nome,SGA_cursos_duracao)
values(3,'Enfermagem no trabalho','1 ano');
insert into cursos(fk_instituicao_id,SGA_cursos_nome,SGA_cursos_duracao)
values(3,'Estrumentação cirurgica','6 meses');

select *from cursos;

#propaganda_homes
select *from propaganda_homes;




