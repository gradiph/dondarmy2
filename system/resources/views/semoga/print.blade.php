<style>
    html,body{
        margin: 0px;
        padding: 0px;
        font-size: 9px;
        font-weight: bold;
        line-height: 19px;
        letter-spacing: 0.5px;
        font-family: arial, verdana;
    }
    div {
        position:fixed;
    }
    #tempat_kegiatan{
        left: 175px;
        top: 31px;
    }
    #tgl_kegiatan{
        left: 185px;
        top:46px;
    }
    #no_register{
        top: 96px;
        left: 372px;
        letter-spacing: 15.2px;
    }
    #nama{
        top: 119px;
        left: 124px;
    }
    #tempat_lahir{
        top: 140px;
        left: 124px;
    }
    #alamat{
        top: 161px;
        left: 124px;
    }
    #kelurahan{
        top: 182px;
        left: 124px;
    }
    #kecamatan{
        top: 203px;
        left: 124px;
    }
    #kelamin{
        letter-spacing: 0px;
        top: 118px;
        left: {{ $donor->kelamin == "Pria" ? "450" : 402 }}px;
    }
    #tgl_lahir, #bulan_lahir, #tahun_lahir{
        display: inline;
        top: 137px;
        letter-spacing: 19px;
    }
    #tgl_lahir {
        left: 406px;
    }
    #bulan_lahir{
        left: 460px;
    }
    #tahun_lahir{
        left: 514px;
    }
    #telp{
        top: 161px;
        left: 402px;
    }
    #rt{
        top: 182px;
        left: 402px;
    }
    #kode_pos{
        top: 203px;
        left: 402px;
    }
    #gol_darah{
        top: 250px;
        left: 514px;
        font-size: 24px;
    }
</style>
<body>
    <div id="atas">
        <div id="tempat_kegiatan">{{ $kegiatan->tempat }}</div>
        <div id="tgl_kegiatan">{{ substr($kegiatan->tgl,8,2).'-'.substr($kegiatan->tgl,5,2).'-'.substr($kegiatan->tgl,2,2) }}</div>
    </div>
    <div id="tengah">
        {{--<div id="no_register">{{ $donor->no_register }}</div>--}}
        <div id="tengah-kiri">
            <div id="nama">{{ $donor->nama }}</div>
            <div id="tempat_lahir">{{ $donor->tempat_lahir }}</div>
            <div id="alamat">{{ $donor->alamat }}</div>
            <div id="kelurahan">{{ $donor->kelurahan }}</div>
            <div id="kecamatan">{{ $donor->kecamatan }}</div>
        </div>
        <div id="tengah-kanan">
            <div id="kelamin">_________</div>
            <div id="tgl_lahir">{{ substr($donor->tgl_lahir,8,2) }}</div>
            <div id="bulan_lahir">{{ substr($donor->tgl_lahir,5,2) }}</div>
            <div id="tahun_lahir">{{ substr($donor->tgl_lahir,2,2) }}</div>
            <div id="telp">{{ $donor->telp }}</div>
            <div id="rt">{{ $donor->rt }} / {{ $donor->rw }}</div>
            <div id="kode_pos">{{ $donor->kode_pos }}</div>
        </div>
    </div>
    <div id="bawah">
        {{--<div id="bawah-kiri">
            <div id="pekerjaan"> <img src="{{ asset('images/check-mark.png') }}" width="20px" height="20px" /></div>
            <div id="penghargaan"></div>
            <div id="total_donor"></div>
            <div id="donor_terakhir"></div>
        </div>--}}
        <div id="bawah-kanan">
            <div id="gol_darah">{{ $donor->golDarah->nama }}</div>
        </div>
    </div>
</body>
