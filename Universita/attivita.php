<?php
$url = 'http://localhost/Univesita/pianostudi.php';
$array = json_decode(file_get_contents($url));
?>
<div class="row">
    <div class="col-3 offset-5">
        <h1>Attività Formativa</h1>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Codice</th>
                    <th scope="col">Nome</th>
                    <th scope="col">CFU</th>
                    <th scope="col">Elimina</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < count($array); $i++): ?>
                    <tr>
                        <td>
                            <?php echo $array[$i]->codice; ?>
                        </td>
                        <td>
                            <?php echo $array[$i]->nome; ?>
                        </td>
                        <td>
                            <?php echo $array[$i]->CFU; ?>
                        </td>
                        <td>
                            <form action="http://localhost/medicina/deleteActivity.php" method="post">
                                <button class="btn btn-outline-dark btn-delete" name="codice"
                                    value="<?php echo $array[$i]->codice; ?>">
                                    
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endfor; ?>
            </tbody>
            <tfooter>
                <tr>
                    <th scope="col">Codice</th>
                    <th scope="col">Nome</th>
                    <th scope="col">CFU</th>
                    <th scope="col">Elimina</th>
                </tr>
            </tfooter>
        </table>
    </div>
</div>