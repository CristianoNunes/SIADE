function valida(form) {
	if (form.barra.value=="") {
		form.barra.focus();
		return false;
	}
	if (form.nome.value=="") {
		form.nome.focus();
		return false;
	}
	if (form.celular.value=="") {
		form.celular.focus();
		return false;
	}
	if (form.login.value=="") {
		form.login.focus();
		return false;
	}
	if (form.senha.value=="") {
		form.senha.focus();
		return false;
	}
	if (form.descricao.value=="") {
		form.descricao.focus();
		return false;
	}
}

function tel(f) {
	if (f.telefone.value.length<10 || f.telefone.value.length>11) {
		f.telefone.focus();
	}else{
		ddd = f.telefone.value.substring(0,2);
		if (f.telefone.value.length==10) {
			part1 = f.telefone.value.substring(3,6);
			part2 = f.telefone.value.substring(6,10);
		}
		if (f.telefone.value.length==11) {
			part1 = f.telefone.value.substring(3,7);
			part2 = f.telefone.value.substring(7,11);
		}
		f.telefone.value = "("+ddd+") "+part1+"-"+part2;
	}

}

function cel(c) {
	ddd = c.celular.value.substring(0,2);
	if (c.celular.value.length==10) {
		part1 = c.celular.value.substring(3,6);
		part2 = c.celular.value.substring(6,10);
	}
	if (c.celular.value.length==11) {
		part1 = c.celular.value.substring(3,7);
		part2 = c.celular.value.substring(7,11);
	}
	c.celular.value = "("+ddd+") "+part1+"-"+part2;
}

function data(d) {
    if (d.data_inicio.value.length<8) {
        d.data_inicio.focus();
    }else{
        ano = d.data_inicio.value.substring(0,4);
        if (d.telefone.value.length==8) {
            mes = d.data_inicio.value.substring(5,6);
            dia = d.data_inicio.value.substring(7,8);
        }
        if (d.telefone.value.length==10) {
            mes = d.data_inicio.value.substring(5,7);
            dia = d.data_inicio.value.substring(7,10);
        }
        d.data_inicio.value = ano+"-"+mes+"-"+dia;
    }
}