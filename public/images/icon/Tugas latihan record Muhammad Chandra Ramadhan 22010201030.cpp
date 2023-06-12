#include<iostream>
#include<bits/stdc++.h>
#include<sstream>
using namespace std;

string getRupiah(string val){
	int count = 0;
	for(int i=val.length()-1;i>=0;i--){
		count++;
		if(count%3==0 && i!=0)val.insert(i,".");
	}
	
	return "Rp."+val;
}

stringstream stream;
class TanggalLahir{
	string tanggal,bulan,tahun;
	public:
		void setTanggalLahir(string tgl,string bln,string thn){
			tanggal = tgl;
			bulan = bln;
			tahun = thn;
		}
		
		string getTanggalLahir(){
			return tanggal + "-" + bulan + "-" + tahun;
		}
};

class Alamat{
	public:
	string namaJalan, kelurahan, kecamatan, kota , kodePos;
	public:
		void setAlamat(string nama,string kel, string kec, string kota, string kode){
			namaJalan = nama;
			kelurahan = kel;
			kecamatan = kec;
			this-> kota = kota;
			kodePos = kode;
		}
		
		string getAlamat(){
			return namaJalan + ", " + kelurahan + ", " + kecamatan + ", " + kota + ", " + kodePos;
		}
};

class Pegawai{
	string NIK,nama,jabatan;
	long long gajiKotor,gajiBersih;
	float pajak;
	Alamat alamat ;
	TanggalLahir tanggal_lahir;
	public:
		Pegawai(string NIK, string nama, string jabatan, long long gajiKotor, 
		 string tgl, string bln, string thn, 
		 string njalan, string kec, string kel, string kot, string pos){
			this->NIK = NIK;
			this->nama = nama;
			this->jabatan = jabatan;
			this->gajiKotor = gajiKotor;
			alamat.setAlamat(njalan, kec, kel, kot, pos);
			tanggal_lahir.setTanggalLahir(tgl,bln,thn) ;
			
			if(gajiKotor > 10000000) pajak = 0.05;
			else if(gajiKotor <= 10000000 ) pajak = 0.03;
			else if(gajiKotor <= 5000000 ) pajak = 0.02;
			else pajak = 0.01;
			
			gajiBersih = (float)gajiKotor - ((float)gajiKotor * pajak);
		}
		
		string getNama(){
			return nama;
		}
		
		void showPegawai(){
			string gKotor = "",gBersih = "";
			stream.str(""); stream << gajiKotor; gKotor = getRupiah(stream.str());
			stream.str(""); stream << gajiBersih; gBersih = getRupiah(stream.str());

			printf("| %-5.5s | %-15.15s | %-10.10s | %-14.14s | %-14.14s | %-20.20s | %-10.10s | \n", NIK.c_str(), nama.c_str(), jabatan.c_str(),
			 gKotor.c_str() , gBersih.c_str(), alamat.getAlamat().c_str(), tanggal_lahir.getTanggalLahir().c_str());
		}

};

int main(){
	Pegawai pegawai[3] =  Pegawai("","","",0,"","","","","","","","");
	pegawai[0] = Pegawai("12345", "M.Chandra.R", "Fungsional", 20000000,"09","11","2004","Jln.Merpati","Tanjungpinang Timur","Batu IX","Tanjungpinang","29125");
	pegawai[1] = Pegawai("54321", "Dimas Adr", "Fungsional", 10000000,"09","10","2003","Jln.Peralatan","Tanjungpinang Timur","Batu IX","Tanjungpinang","29125");
	pegawai[2] = Pegawai("12322", "Syawal.N", "Fungsional", 3000000,"09","02","2002","Jln.Poltek","Tanjungpinang Timur","Batu IX","Tanjungpinang","29125");
	cout << "==============================================================================================================" << endl;
	cout << "| NIK   |  Nama           | Jabatan    | Gaji Kotor     | Gaji Bersih    | Alamat               | Tgl.Lahir  | " << endl;
	cout << "==============================================================================================================" << endl;

	for(int i=0;i<3;i++){
		pegawai[i].showPegawai();
	}
	cout << "==============================================================================================================" << endl;

}
