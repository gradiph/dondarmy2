<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        html, body {
            margin: 0;
            padding: 0;
            display: hidden;
            font-size: 11px;
            font-family: arial;
            font-weight: bold;
        }
        #print {
            display: block;
            width: 161mm;
            height: 91mm;
        }
        .block {
            display: block;
        }
        .fixed {
            position: fixed;
        }
        #atas {
            height: 17mm;
        }
        #tengah {
            height: 43mm;
        }
        #tempat_kegiatan {
            top: 9mm;
            left: 51mm;
        }
        #tgl_kegiatan {
            top: 13mm;
            left: 53mm;
        }
        #no_register {
            //
        }
        #nama {
            top: 33mm;
            left: 36.5mm;
        }
        #tempat_lahir {
            top: 37.5mm;
            left: 36.5mm;
        }
        #alamat {
            top: 43mm;
            left: 36.5mm;
        }
        #kelurahan {
            top: 48.5mm;
            left: 36.5mm;
        }
        #kecamatan {
            top: 54mm;
            left: 36.5mm;
        }
        #kelamin {
            top: 31.5mm;
            left: {{ $donor->kelamin == 'Wanita' ? '108' : '122' }}mm;
        }
        #tgl_lahir {
            letter-spacing: 4mm;
            top: 37.5mm;
            left: 111.5mm;
        }
        #bulan_lahir {
            letter-spacing: 4mm;
            top: 37.5mm;
            left: 125.5mm;
        }
        #tahun_lahir {
            letter-spacing: 4mm;
            top: 37.5mm;
            left: 139.5mm;
        }
        #telp {
            top: 43mm;
            left: 110mm;
        }
        #rt {
            top: 48.5mm;
            left: 110mm;
        }
        #kode_pos {
            top: 54mm;
            left: 110mm;
        }
        #pekerjaan {
            //
        }
        #penghargaan {
            //
        }
        #total_donor {
            //
        }
        #donor_terakhir {
            //
        }
        #gol_darah {
            font-size: 28px;
            top: 70mm;
            left: 135mm;
        }
    </style>
</head>
<body>
    <div id="print">
        <div id="atas" class="block">
            <div id="tempat_kegiatan" class="fixed">{{ $kegiatan->tempat }}</div>
            <div id="tgl_kegiatan" class="fixed">{{ substr($kegiatan->tgl,8,2).'-'.substr($kegiatan->tgl,5,2).'-'.substr($kegiatan->tgl,2,2) }}</div>
        </div>
        <div id="tengah" class="block">
            {{--<div id="no_register">{{ $donor->no_register }}</div>--}}
            <div id="tengah-kiri">
                <div id="nama" class="fixed">{{ $donor->nama }}</div>
                <div id="tempat_lahir" class="fixed">{{ $donor->tempat_lahir }}</div>
                <div id="alamat" class="fixed">{{ $donor->alamat }}</div>
                <div id="kelurahan" class="fixed">{{ $donor->kelurahan }}</div>
                <div id="kecamatan" class="fixed">{{ $donor->kecamatan }}</div>
            </div>
            <div id="tengah-kanan">
                <div id="kelamin" class="fixed">_________</div>
                <div id="tgl_lahir" class="fixed">{{ substr($donor->tgl_lahir,8,2) }}</div>
                <div id="bulan_lahir" class="fixed">{{ substr($donor->tgl_lahir,5,2) }}</div>
                <div id="tahun_lahir" class="fixed">{{ substr($donor->tgl_lahir,2,2) }}</div>
                <div id="telp" class="fixed">{{ $donor->telp }}</div>
                <div id="rt" class="fixed">{{ $donor->rt }} / {{ $donor->rw }}</div>
                <div id="kode_pos" class="fixed">{{ $donor->kode_pos }}</div>
            </div>
        </div>
        <div id="bawah" class="block">
            {{--<div id="bawah-kiri">
                <div id="pekerjaan"> <img src="{{ asset('images/check-mark.png') }}" width="20px" height="20px" /></div>
                <div id="penghargaan"></div>
                <div id="total_donor"></div>
                <div id="donor_terakhir"></div>
            </div>--}}
            <div id="bawah-kanan">
                <div id="gol_darah" class="fixed">{{ $donor->golDarah->nama }}</div>
            </div>
        </div>
    </div>
</body>
<script src="{{asset('/js/jquery-2.2.3.min.js')}}"></script>
<script>
    $(document).ready(function() {
        window.print();
        setTimeout(function() { window.close(); }, 100);
    });
</script>
</html>
