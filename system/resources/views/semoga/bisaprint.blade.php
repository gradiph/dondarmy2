<script>
    $(".loading").hide();
    window.location.href = "{{ url('semoga') }}";
    var donor_id = "{{ $id }}";
    var win = window.open('{{ url('semoga/print?donor_id=') }}' + donor_id, '_blank');
    if (win) {
        //Browser has allowed it to be opened
        win.focus();
    }
    else {
        //Browser has blocked it
        alert('Please allow popups for this website');
    }
</script>
