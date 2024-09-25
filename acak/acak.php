<script src="../node_modules/jquery-3.4.1.min.js"></script>
<script language="javascript">
    function RandomNumber() {
        return Math.ceil(Math.random() * 10);
    }
    // document.write(RandomNumber());

    function dummy() {
        $.ajax({
            method: "POST",
            url: "../inc/olah.php",
            data: {
                p: "dummy",
                curah_hujan: RandomNumber(),
                tanggal: '2020-10-21',
                waktu: '10:25',
                lokasi: 'Kendal',
                // sed_sim: sed_sim,

            },
            dataType: "json"
        })
    }
    setInterval(function() {
        dummy();
    }, 240000);
</script>