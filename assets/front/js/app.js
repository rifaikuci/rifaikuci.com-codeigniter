// Vuejs Dom işlemleri iletişim kısmında gelen botları engellemek için kullanıldı
new Vue({
    el : "#app",
    data: {
        sayi1 : Math.floor(Math.random() * (50 - 1 + 1)) + 1,
        sayi2 : Math.floor(Math.random() * (10 - 1 + 1)) + 1,
        sonuc : '',
        game_is_on : false
    },
    watch : {
        sonuc : function(value){
            if(value==this.sayi1+this.sayi2){this.game_is_on = true}

            else {this.game_is_on =false;} }
    }
});

new Vue({
    el : "#appfereli",
    data: {
        fsayi1 : Math.floor(Math.random() * (50 - 1 + 1)) + 1,
        fsayi2 : Math.floor(Math.random() * (10 - 1 + 1)) + 1,
        fsonuc : '',
        fgame_is_on : false
    },
    watch : {
        fsonuc : function(value){
            if(value==this.fsayi1+this.fsayi2){ this.fgame_is_on = true}

            else {this.fgame_is_on =false;}
        }
    }
});