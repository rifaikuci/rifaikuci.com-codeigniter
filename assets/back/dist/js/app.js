new Vue({
        el: "#app",
        data: {
            veriKriter: '',
            veriSecenek: '',
            tur: '1',
            kriter: [],
            secenek: [],
            veriKriter_is_hata: false,
            veriSecenek_is_hata: false
        },

        methods: {
            kriterEkle: function (event) {
                event.preventDefault();

                if (this.veriKriter != "") {
                    if (this.tur == 1) {
                        this.veriKriter = this.veriKriter + " (Max)";
                        this.kriter.push(this.veriKriter);
                        this.veriKriter = "";

                    } else {
                        this.veriKriter = this.veriKriter + " (Min)";
                        this.kriter.push(this.veriKriter);

                        this.veriKriter = "";
                    }
                    this.veriKriter_is_hata = false;
                    this.veriSecenek_is_hata = false;

                } else {
                    this.veriKriter_is_hata = true;
                    this.veriSecenek_is_hata = false;

                }
            },

            kriterSil: function (index) {
                this.$delete(this.kriter, index)
            },

            secenekEkle: function (event) {
                event.preventDefault();

                if (this.veriSecenek != "") {
                    this.secenek.push(this.veriSecenek);
                    this.veriSecenek_is_hata = false;
                    this.veriSecenek = "";
                } else {
                    this.veriSecenek_is_hata = true;
                }
            },

            secenekSil: function (index) {
                this.$delete(this.secenek, index)
            },
        }
    }
);