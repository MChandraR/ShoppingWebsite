#include<iostream>
#include<cstdio>
#include<sstream>
#include<conio.h>
#define ll long long
using namespace std;

stringstream stream;

class Harga {
	public:
		long long harga_sebelum_diskon,harga_setelah_diskon;
		float diskon;
};

class WaktuPembelian{
	string tanggal, bulan , tahun , jam , menit, detik;
	public:
		void setWaktu(string tanggal , string bulan , string tahun, string jam, string menit , string detik){
			this->tanggal = tanggal;
			this->bulan = bulan;
			this->tahun = tahun;
			this->jam = jam;
			this->menit = menit;
			this->detik = detik;
		}
		
		string getWaktu(){
			return tanggal + "-" + bulan + "-" +  tahun + " " + jam + ":" + menit + ":" + detik;
 		}
};

class Pembelian{
	public:
	    Harga harga;
		WaktuPembelian waktu;
		long long total_bayar,total_setelah_diskon;
		
		Pembelian( ){
			total_setelah_diskon = 0ll;
			total_bayar = 0ll;
			harga.diskon = 0;
		}
		
		void setPembelian(ll harga ,ll  total_bayar ,  string t, string b, string th, string j, string m , string d){
			this->harga.harga_sebelum_diskon = harga;
			this->total_bayar = total_bayar;
			waktu.setWaktu(t,b,th,j,m,d);
			
			if(total_bayar >= 500000) this->harga.diskon = 0.05;
			else if(total_bayar >= 300000) this->harga.diskon = 0.03;
			else this->harga.diskon = 0.0;

			total_setelah_diskon = this->harga.harga_sebelum_diskon  - (ll)(this->harga.harga_sebelum_diskon*this->harga.diskon);
			this->harga.harga_setelah_diskon = total_setelah_diskon;
		}
		
		

};

class Penjualan{
	public:
	string nama , alamat ;
	Pembelian pembelian;
	
	public : 
		Penjualan(string nama, string alamat){
			this->nama = nama;
			this->alamat = alamat;
		}
};


int main(){
	string inp ;
	do{
		system("cls");
		string nama,alamat, tanggal, bulan, tahun , jam ,menit , detik;
		ll harga_pembelian , total_bayar;
		
		cout << "Masukkan nama toko  : " ; getline(cin,nama);
		cout << "Masukkan almat toko : " ; getline(cin,alamat);
		
		Penjualan penjualan(nama,alamat);
		cout << "\nMasukkan harga pembelian : " ;cin >> harga_pembelian;
		cout << "Masukkan total bayar     : " ; cin >> total_bayar;
		cout << "Masukkan waktu pembelian \nTanggal : " ;cin >> tanggal;
		cout << "Bulan   : " ;cin >> bulan;
		cout << "Tahun   : " ;cin >> tahun;
		cout << "Jam     : " ;cin >> jam;
		cout << "Menit   : " ;cin >> menit;
		cout << "Detik   : " ;cin >> detik;
		
		penjualan.pembelian.setPembelian(harga_pembelian,total_bayar,tanggal,bulan,tahun,jam,menit,detik);
		cout << "======================================"  << endl;
		cout << "Total diskon : " << penjualan.pembelian.harga.diskon << endl;
		cout << "Total bayar setelah diskon : " << penjualan.pembelian.total_setelah_diskon << endl;
		cout << "Waktu transaksi : " << penjualan.pembelian.waktu.getWaktu() << endl;
		
		cout << "\nApakah anda ingin melakukan transaksi lagi (y/n) ?" ; cin >> inp; cin.ignore();
	}while(inp=="y"||inp=="Y");
	
}
