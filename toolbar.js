function toggle_cdm_expanded() {
    notify_progress("Loading, please wait...");

    var value = getInitParam("cdm_expanded") ? "false" : "true";
    var query = "?op=rpc&method=setpref&key=CDM_EXPANDED&value=" + value;

    var a = new Ajax.Request("backend.php", {
        parameters: query,
        onComplete: function(transport) {
            setInitParam("cdm_expanded", !getInitParam("cdm_expanded"));
            viewCurrentFeed();
        }
    });
}

function show_gift_dialog() {
    var title      = 'Vous aimez Framanews ?';
    var content    = 'Framasoft est une association qui ne vit que grâce à vos dons.<br>Si vous souhaitez soutenir Framasoft, c\'est <a href="http://soutenir.framasoft.org" target="_blank">par ici</a> !';
    var thisdialog = new dijit.Dialog({ title: title, content: content });
    dojo.body().appendChild(thisdialog.domNode);
    thisdialog.startup();
    thisdialog.show();
}
