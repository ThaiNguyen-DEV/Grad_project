# Hybrid RAG cho chatbot LOTUSMILE

Chatbot kết hợp hai kiểu tìm kiếm:

- Qdrant + Cohere Embeddings để tìm tour theo ngữ nghĩa.
- MySQL để tìm theo từ khóa và làm phương án dự phòng.

## Khởi động và đồng bộ

1. Chép các biến trong `.env.rag.example` vào `.env` (giữ `COHERE_API_KEY` hiện có).
2. Bật Docker Desktop, sau đó chạy:

```powershell
docker compose up -d qdrant
php artisan config:clear
php artisan rag:sync-tours --recreate
```

Chạy lại lệnh đồng bộ sau khi thêm, sửa hoặc xóa dữ liệu tour. Nếu Qdrant không hoạt động, chatbot tự động dùng tìm kiếm MySQL và vẫn trả lời bình thường.

## Kiểm tra

```powershell
php artisan test
```

Một vài câu hỏi demo semantic search:

- Tôi muốn nghỉ dưỡng ở nơi có biển, phù hợp gia đình.
- Có chuyến nào đến nơi khí hậu mát mẻ không?
- Tôi thích khám phá đảo và hoạt động ngoài trời.

## After
- Sau khi thêm/sửa/xóa tour --> php artisan rag:sync-tours --recreate
