$("#denunciar").click(function() {
  Swal.fire({
    title: 'Problemas com esse Herói? Fazendo a denuncia a Equipe Eyhe será acionada',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: `Quero denunciar`,
    cancelButtonText: 'Cancelar',
  }).then((result) => {

    if (result.isConfirmed) {
      Swal.fire({
        icon: 'success',
        title: 'Feito! ',
        text: 'A Equipe Eyhe já recebeu sua denuncia!',
      })
      var frase = NOMEANJO+' acabou de criar uma denuncia sobre o heroi '+NOMEHEROI;
      envia_sms('554699177534', frase);
      envia_sms('554699247368', frase);
      envia_sms('554688011011', frase);;
    }
  })

});
