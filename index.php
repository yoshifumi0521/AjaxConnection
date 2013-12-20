<!DOCTYPE html>
<html lang="ja">
<head>
    <title>Ajaxの直列通信のサンプル</title>
    <meta charset="UTF-8" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <!--IEでJSONが使えない場合があるので、JSONライブラリを読み込む(http://bestiejs.github.com/json3/)-->
    <script>
    if (!("JSON" in window)) {
        document.write('<script src="//cdnjs.cloudflare.com/ajax/libs/json3/3.2.4/json3.min.js"></scr'+'ipt>');
    }
    </script>

</head>
<body>


<script>
$(function(){

    var df = $.Deferred();
    //APIの処理を直列処理する。
    ajaxConnect1().pipe(ajaxConnect2).pipe(ajaxConnect3)
    //処理が終わったあとにする処理
    .done(function(data){
        df.resolve(data);
    })
    //処理がうまくいなかったとき
    .fail(function(data){
        df.reject(data);
    });
    return df.promise();

    //Ajax通信1
    function ajaxConnect1(){
        var df = $.Deferred();
        //Ajax通信をする。
        $.ajax({
            type: "get",
            url: "URL",
            dataType: 'json'
        })
        //Ajax通信に成功した時
        .done(function(data){
            df.resolve(data);
        })
        .fail(function(){
            df.reject("ajaxConnect1のエラー");
        });
        return df.promise();
    }

    //Ajax通信2
    function ajaxConnect2(){
        var df = $.Deferred();
        //Ajax通信をする。
        $.ajax({
            type: "get",
            url: "URL",
            dataType: 'json'
        })
        //Ajax通信に成功した時
        .done(function(data){
            df.resolve(data);
        })
        .fail(function(){
            df.reject("ajaxConnect2のエラー");
        });
        return df.promise();
    }

   //Ajax通信3
    function ajaxConnect3(){
        var df = $.Deferred();
        //Ajax通信をする。
        $.ajax({
            type: "get",
            url: "URL",
            dataType: 'json'
        })
        //Ajax通信に成功した時
        .done(function(data){
            df.resolve(data);
        })
        .fail(function(){
            df.reject("ajaxConnect3のエラー");
        });
        return df.promise();
    }


});
</script>


</body>







