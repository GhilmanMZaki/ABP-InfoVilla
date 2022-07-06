import 'reviewModel.dart';

class Villa {
  Villa({
    required this.id,
    required this.namaVilla,
    required this.deskripsi,
    required this.lokasi,
    required this.harga,
    this.image,
    required this.review,
    required this.rating,
    required this.reviewCount,
    required this.favoriteCount,
  });

  int id;
  String namaVilla;
  String deskripsi;
  String lokasi;
  String harga;
  String? image;
  List<Review> review;
  int rating;
  int reviewCount;
  int favoriteCount;

  factory Villa.fromJson(Map<String, dynamic> json) => Villa(
        id: json["id"],
        namaVilla: json["namaVilla"],
        deskripsi: json["deskripsi"],
        lokasi: json["lokasi"],
        harga: json["harga"],
        image: json["image"],
        review:
            List<Review>.from(json["review"].map((x) => Review.fromJson(x))),
        rating: json["rating"],
        reviewCount: json["review_count"],
        favoriteCount: json["favorite_count"],
      );
}
