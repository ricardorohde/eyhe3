var OneSignal = window.OneSignal || [];


/*
  primeiro: pede autorização para enviar notificação
  (se -> aceita), eu pego o id e salvo no banco o id da notificacao + id do usuario!
  (se -> nao aceita) eu pego e salvo no banco que ele nao aceitou e deveria tentar novamente em outro momento

*/



  /*OneSignal.push(function() {

    OneSignal.init({
      appId: "baf829cb-4211-4edf-a29d-40a2c6a3c8cd",
    });

    OneSignal.getUserId(function(userId) {
      alert(userId);
    });

  });*/

  OneSignal.push(function() {
  OneSignal.on('customPromptClick', function(promptClickResult) {
    var promptClickResult = permissionChange.result;
    console.log('HTTP Pop-Up Prompt click result:', promptClickResult);
  });

  // This event can be listened to via the on() or once() listener
});



/*
OneSignal.push(function() {
  OneSignal.on('subscriptionChange', function(isSubscribed) {
    if (isSubscribed) {
      // The user is subscribed
      //   Either the user subscribed for the first time
      //   Or the user was subscribed -> unsubscribed -> subscribed
      OneSignal.getUserId( function(userId) {
        // Make a POST call to your server with the user ID
      });
    }
  });
});
*/
