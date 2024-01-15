<div class="modal fade" id="modalTransactionHour" tabindex="-1" role="dialog" aria-labelledby="modalTransactionTitle"
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
                <form action="{{ route('transaction') }}" method="post">
                    <div class="form-group">
                        <label for="name" class="col-form-label">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" required
                            value="@if (auth()->user()) {{ auth()->user()->username }} @else '' @endif"
                            readonly>
                        <label for="merek" class="col-form-label">Merek</label>
                        <input type="text" class="form-control" id="merek"
                            value="@if (auth()->user()) {{ auth()->user()->username }} @else '' @endif"
                            required>
                        <label for="tgl_rental" class="col-form-label">Mulai Tanggal</label>
                        <input type="date" class="form-control" id="tgl_rental" name="tgl_rental" required>
                        <label for="jam_mulai" class="col-form-label">Jam Mulai</label>
                        <input type="time" class="form-control" id="jam_mulai" name="jam_mulai" required>
                        <label for="jam_selesai" class="col-form-label">Jam Selesai</label>
                        <input type="time" class="form-control" id="jam_selesai" name="jam_selesai" required>
                        <label for="jam_selesai" class="col-form-label">Total Durasi</label>
                        <input type="text" class="form-control" id="durasi" name="durasi" readonly>
                        <label for="harga" class="col-form-label">Harga</label>
                        <input type="text" class="form-control" id="harga" name="harga" readonly>
                        <label for="total" class="col-form-label">Total</label>
                        <input type="text" class="form-control" id="total" name="total" readonly>
                        <label for="paymentMethod" class="col-form-label">Metode Pembayaran</label>
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
                                dan kirim bukti pembayaran
                                <br>
                                <img id="previewiTf" style="visibility:hidden;" class="rounded mx-auto d-block mt-2"
                                    width="200" alt="buktiPembayaran">
                                <div class="mb-3">
                                    <label for="buktiPembayaran" class="form-label">Upload bukti pembayaran</label>
                                    <input class="form-control" type="file" id="buktiPembayaran"
                                        name="buktiPembayaran" onchange="previewImage('previewiTf','buktiPembayaran')"
                                        accept="image/*" required>
                                </div>
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


<div class="modal fade" id="modalTransactionDay" tabindex="-1" role="dialog"
    aria-labelledby="modalTransactionTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Data Transaksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('transaction') }}" method="post">
                    <div class="form-group">
                        <label for="name" class="col-form-label">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" required
                            value="@if (auth()->user()) {{ auth()->user()->username }} @else '' @endif"
                            readonly>
                        <label for="merek" class="col-form-label">Merek</label>
                        <input type="text" class="form-control" id="merek"
                            value="@if (auth()->user()) {{ auth()->user()->username }} @else '' @endif"
                            required>
                        <label for="tgl_rental" class="col-form-label">Mulai Tanggal</label>
                        <input type="date" class="form-control" id="tgl_rental" name="tgl_rental" required>
                        <label for="jam_mulai" class="col-form-label">Jam Mulai</label>
                        <input type="time" class="form-control" id="jam_mulai" name="jam_mulai" required>
                        <label for="tgl_kembali" class="col-form-label">Sampai Tanggal</label>
                        <input type="date" class="form-control" id="tgl_kembali" name="tgl_kembali" required>
                        <label for="jam_selesai" class="col-form-label">Total Durasi</label>
                        <input type="text" class="form-control" id="durasi" name="durasi" readonly>
                        <label for="harga" class="col-form-label">Harga</label>
                        <input type="text" class="form-control" id="harga" name="harga" readonly>
                        <label for="total" class="col-form-label">Total</label>
                        <input type="text" class="form-control" id="total" name="total" readonly>
                        <label for="paymentMethod" class="col-form-label">Metode Pembayaran</label>
                        <div class="col-form-label">
                            <div class="form-check d-flex align-items-center">
                                <input class="form-check-input" type="radio" name="paymentMethod"
                                    id="transferOption" value="option1" onclick="showTransferDetails()">
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
                                dan kirim bukti pembayaran
                                <br>
                                <img id="previewiTf" style="visibility:hidden;" class="rounded mx-auto d-block mt-2"
                                    width="200" alt="buktiPembayaran">
                                <div class="mb-3">
                                    <label for="buktiPembayaran" class="form-label">Upload bukti pembayaran</label>
                                    <input class="form-control" type="file" id="buktiPembayaran"
                                        name="buktiPembayaran" onchange="previewImage('previewiTf','buktiPembayaran')"
                                        accept="image/*" required>
                                </div>
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

<div class="modal fade" id="modalTransactionWeekly" tabindex="-1" role="dialog"
    aria-labelledby="modalTransactionTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Data Transaksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('transaction') }}" method="post">
                    <div class="form-group">
                        <label for="name" class="col-form-label">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" required
                            value="@if (auth()->user()) {{ auth()->user()->username }} @else '' @endif"
                            readonly>
                        <label for="merek" class="col-form-label">Merek</label>
                        <input type="text" class="form-control" id="merek"
                            value="@if (auth()->user()) {{ auth()->user()->username }} @else '' @endif"
                            required>
                        <label for="tgl_rental" class="col-form-label">Mulai Tanggal</label>
                        <input type="date" class="form-control" id="tgl_rental" name="tgl_rental" required>
                        <label for="jam_mulai" class="col-form-label">Jam Mulai</label>
                        <input type="time" class="form-control" id="jam_mulai" name="jam_mulai" required>
                        <label for="tgl_kembali" class="col-form-label">Sampai Tanggal</label>
                        <input type="date" class="form-control" id="tgl_kembali" name="tgl_kembali" required>
                        <label for="jam_selesai" class="col-form-label">Total Durasi</label>
                        <input type="text" class="form-control" id="durasi" name="durasi" readonly>
                        <label for="harga" class="col-form-label">Harga</label>
                        <input type="text" class="form-control" id="harga" name="harga" readonly>
                        <label for="total" class="col-form-label">Total</label>
                        <input type="text" class="form-control" id="total" name="total" readonly>
                        <label for="paymentMethod" class="col-form-label">Metode Pembayaran</label>
                        <div class="col-form-label">
                            <div class="form-check d-flex align-items-center">
                                <input class="form-check-input" type="radio" name="paymentMethod"
                                    id="transferOption" value="option1" onclick="showTransferDetails()">
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
                                dan kirim bukti pembayaran
                                <br>
                                <img id="previewiTf" style="visibility:hidden;" class="rounded mx-auto d-block mt-2"
                                    width="200" alt="buktiPembayaran">
                                <div class="mb-3">
                                    <label for="buktiPembayaran" class="form-label">Upload bukti pembayaran</label>
                                    <input class="form-control" type="file" id="buktiPembayaran"
                                        name="buktiPembayaran" onchange="previewImage('previewiTf','buktiPembayaran')"
                                        accept="image/*" required>
                                </div>
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
