from PIL import Image, ImageDraw, ImageFont


OUT = r"C:\Project\Graduation_Project\rag_system_architecture.png"
W, H = 1600, 1000
img = Image.new("RGB", (W, H), "white")
d = ImageDraw.Draw(img)


def font(size, bold=False):
    path = r"C:\Windows\Fonts\arialbd.ttf" if bold else r"C:\Windows\Fonts\arial.ttf"
    return ImageFont.truetype(path, size)


F_TITLE = font(28, True)
F_LABEL = font(24, True)
F_SUB = font(19)
F_EDGE = font(17)


def centered(text, xy, fnt, fill):
    x, y = xy
    box = d.textbbox((0, 0), text, font=fnt)
    d.text((x - (box[2] - box[0]) / 2, y - (box[3] - box[1]) / 2), text, font=fnt, fill=fill)


def box(rect, fill, outline, title, lines, title_color, line_color=None):
    d.rounded_rectangle(rect, radius=18, fill=fill, outline=outline, width=3)
    x1, y1, x2, y2 = rect
    cx = (x1 + x2) / 2
    centered(title, (cx, y1 + 43), F_LABEL, title_color)
    color = line_color or title_color
    start = y1 + 82
    for i, line in enumerate(lines):
        centered(line, (cx, start + i * 34), F_SUB, color)


def arrow_line(points, label=None, label_xy=None, both=True):
    color = "#607d8b"
    d.line(points, fill=color, width=4, joint="curve")
    def head(p_from, p_to):
        import math
        angle = math.atan2(p_to[1] - p_from[1], p_to[0] - p_from[0])
        length, wing = 15, 7
        tip = p_to
        base = (tip[0] - length * math.cos(angle), tip[1] - length * math.sin(angle))
        left = (base[0] + wing * math.sin(angle), base[1] - wing * math.cos(angle))
        right = (base[0] - wing * math.sin(angle), base[1] + wing * math.cos(angle))
        d.polygon([tip, left, right], fill=color)
    head(points[-2], points[-1])
    if both:
        head(points[1], points[0])
    if label and label_xy:
        centered(label, label_xy, F_EDGE, "#455a64")


centered("LOTUSMILE SYSTEM ARCHITECTURE WITH HYBRID RAG", (800, 34), F_TITLE, "#263238")
d.rounded_rectangle((250, 85, 1350, 915), radius=28, fill="#fbfcfd", outline="#b0bec5", width=3)
centered("Docker Compose network", (800, 111), F_SUB, "#607d8b")

box((25, 390, 215, 520), "#e3f2fd", "#64b5f6", "Client", ["Browser / Mobile"], "#1565c0")
box((290, 390, 500, 520), "#e0f2f1", "#4db6ac", "Nginx", ["Reverse proxy"], "#00695c")
box((595, 330, 895, 580), "#ede7f6", "#9575cd", "Laravel App", ["PHP backend / API", "Auth · Booking · Payment", "ChatbotController", "HybridTourRetriever · RRF", "SQL fallback"], "#4527a0", "#5e35b1")
box((560, 690, 835, 835), "#fbe9e7", "#ff8a65", "Flask AI Service", ["TF-IDF · Cosine Similarity", "Recommendation API"], "#bf360c", "#d84315")
box((1030, 260, 1280, 400), "#fff8e1", "#ffca28", "MySQL", ["Authoritative data", "Tours · Users · Bookings"], "#8d6e00")
box((1030, 510, 1280, 650), "#e8f5e9", "#66bb6a", "Qdrant", ["Tour vector index", "Cosine similarity search"], "#2e7d32")
box((1390, 170, 1575, 315), "#e8eaf6", "#7986cb", "Cohere API", ["Embeddings", "Grounded chat"], "#303f9f")
box((1390, 430, 1575, 570), "#f1f8e9", "#9ccc65", "Payment GW", ["VNPay · ZaloPay", "External service"], "#558b2f")
box((1030, 745, 1280, 855), "#fff3e0", "#ffb74d", "Ngrok Tunnel", ["Development IPN callback"], "#e65100")

arrow_line([(215, 455), (290, 455)], "HTTP", (252, 436))
arrow_line([(500, 455), (595, 455)], "REST / AJAX", (548, 436))
arrow_line([(895, 395), (965, 350), (1030, 330)], "SQL + catalog facts", (970, 320))
arrow_line([(895, 520), (965, 560), (1030, 580)], "Vector search REST", (960, 600))
arrow_line([(697, 580), (697, 690)], "Recommendation REST API", (820, 635))
arrow_line([(895, 350), (1060, 180), (1245, 150), (1390, 235)], "HTTPS: Embed query / Grounded chat", (1170, 125))
arrow_line([(895, 555), (955, 670), (1060, 760)], "IPN callback", (940, 675))
arrow_line([(1280, 800), (1390, 700), (1460, 570)], "IPN / redirect", (1410, 685))

d.rounded_rectangle((30, 865, 220, 970), radius=12, fill="#fafafa", outline="#cfd8dc", width=2)
d.text((48, 882), "Legend", font=F_SUB, fill="#455a64")
d.rectangle((48, 915, 68, 935), fill="#ede7f6", outline="#9575cd")
d.text((78, 915), "Internal service", font=F_EDGE, fill="#455a64")
d.rectangle((48, 943, 68, 963), fill="#e8eaf6", outline="#7986cb")
d.text((78, 943), "External service", font=F_EDGE, fill="#455a64")

img.save(OUT, quality=95)
