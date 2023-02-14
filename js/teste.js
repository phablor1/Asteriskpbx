var val = '';
function nvoipdigita(valor) {
    document.getElementById('nvoip-uri').value = val += valor;
    //console.log(valor);
}
function limpar() {
    val = document.getElementById('nvoip-uri').value = '';
}
//function siphone() {

/*function sip(){
    var sipStack = new SIPml.Stack({
        realm:'172.18.0.2',
        impi: '1000',
        impu: 'sip:1000@172.18.0.2',
        password: 'pbx1000',
        display_name: 'Teste',
        enable_rtcweb_break: 'false',
        websocket_proxy_url: 'wss://172.18.0.2:8088/ws',
        events_listener: {
            events: '*',
            listener: sipEventListener
        }
    });
    sipStack.start();
    //alert(msg);
    //var msg = 'vc não está logado !!!';
    //return alert(msg);
    //console.log(msg);
}*/