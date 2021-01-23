 <?php 
interface KendaraanInterface{
	public function get_bahan_bakar();
}
 
 
interface JalurInterface{
	public function get_jalur();
}
 
 
abstract class Kendaraan
{
	private $jenis;
 
	public function set_bahan_bakar($jenis){
		$this->jenis = $jenis;
	}
 
	public function get_bahan_bakar()
	{
		return $this->jenis;
	}
}
 
class bus extends Kendaraan implements KendaraanInterface, JalurInterface{
	public function get_jalur()
	{
		return 'Jalurnya adalah Jalan Raya';
	}
}
 
class pesawat extends Kendaraan implements KendaraanInterface, JalurInterface{
	public function get_jalur()
	{
		return 'Berjalan di Langit';
	}
}
 
class kapal extends Kendaraan implements KendaraanInterface, JalurInterface{
	public function get_jalur()
	{
		return 'Berjalan di Laut';
	}
}
 
 
$bus = new bus();
$bus->set_bahan_bakar('Solar');
 
$pesawat = new pesawat();
$pesawat->set_bahan_bakar('Avtur');
 
$kapal = new kapal();
$kapal->set_bahan_bakar('Solar');
 
echo $bus->get_bahan_bakar();
echo "<br/>";
echo $bus->get_jalur();
echo "<hr/>";
echo $pesawat->get_bahan_bakar();
echo "<br/>";
echo $pesawat->get_jalur();
echo "<hr/>";
echo $kapal->get_bahan_bakar();
echo "<br/>";
echo $kapal->get_jalur();
?>