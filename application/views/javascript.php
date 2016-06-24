<script>
idtest = <?php echo $this->session->userdata('idtest'); ?> ;
idquestion = <?php echo $this->session->userdata('idquestion'); ?>;
alert(idtest + ' - ' + idquestion);
</script>