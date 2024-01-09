<div class="modal fade" id="modalTransaction" tabindex="-1" role="dialog" aria-labelledby="modalTransactionTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Data Transaksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nama</label>
                        <input type="text" class="form-control" id="recipient-name" required>
                        <label for="recipient-name" class="col-form-label">Merek</label>
                        <input type="text" class="form-control" id="recipient-name" required>
                        <label for="recipient-name" class="col-form-label">Mulai Tanggal</label>
                        <input type="time" class="form-control" id="recipient-name" required>
                        <label for="recipient-name" class="col-form-label">Sampai Tanggal</label>
                        <input type="time" class="form-control" id="recipient-name" required>
                        <label for="recipient-name" class="col-form-label">Harga</label>
                        <input type="text" class="form-control" id="recipient-name" readonly>
                        <label for="recipient-name" class="col-form-label">Total</label>
                        <input type="text" class="form-control" id="recipient-name" readonly>
                        <label for="recipient-name" class="col-form-label">Metode Pembayaran</label>
                        <div class="col-form-label">
                            <div class="form-check d-flex align-items-center">
                                <input class="form-check-input" type="radio" name="paymentMethod" id="transferOption"
                                    value="option1" onclick="showTransferDetails()">
                                <label class="form-check-label" for="transferOption" id="transferLabel">
                                    Transfer
                                </label>
                            </div>
                            <div class="form-check d-flex align-items-center">
                                <input class="form-check-input" type="radio" name="paymentMethod" id="cashOption"
                                    value="option2" onclick="showCashDetails()">
                                <label class="form-check-label" for="cashOption" id="cashLabel">
                                    Cash
                                </label>
                            </div>
                        </div>

                        <div id="transferDetails" style="display: none;">
                            <label>
                                Transfer sesuai dengan total ke
                                <strong>12348723402</strong>
                                atas nama
                                <strong>Aawaall</strong>
                            </label>
                        </div>

                        <div id="cashDetails" style="display: none;">
                            <label>
                                Pembayaran cash dilakukan ditempat saat pengambilan mobil
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script>
    function showTransferDetails() {
        document.getElementById('transferDetails').style.display = 'block';
        document.getElementById('cashDetails').style.display = 'none';
    }

    function showCashDetails() {
        document.getElementById('transferDetails').style.display = 'none';
        document.getElementById('cashDetails').style.display = 'block';
    }
</script>
