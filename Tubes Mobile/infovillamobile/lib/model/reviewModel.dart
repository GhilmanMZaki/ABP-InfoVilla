import 'package:infovillamobile/model/userModel.dart';

class Review {
  Review({
    required this.id,
    required this.userId,
    required this.villaId,
    required this.review,
    required this.rating,
    this.image,
  });

  int id;
  int userId;
  int villaId;
  String review;
  int rating;
  String? image;

  factory Review.fromJson(Map<String, dynamic> json) => Review(
        id: json["id"],
        userId: json["user_id"],
        villaId: json["villa_id"],
        review: json["review"],
        rating: json["rating"],
        image: json["image"] == null ? null : json["image"],
      );
}
