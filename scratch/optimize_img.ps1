Add-Type -AssemblyName System.Drawing
$sourcePath = "public\assets\image copy 3.png"
$destPath = "public\assets\servis_motor.jpg"

if (Test-Path $sourcePath) {
    $img = [System.Drawing.Image]::FromFile((Resolve-Path $sourcePath).Path)
    $w = 540
    $h = [int]($w * ($img.Height / $img.Width))
    $target = New-Object System.Drawing.Bitmap $w, $h
    $g = [System.Drawing.Graphics]::FromImage($target)
    $g.InterpolationMode = [System.Drawing.Drawing2D.InterpolationMode]::HighQualityBicubic
    $g.SmoothingMode = [System.Drawing.Drawing2D.SmoothingMode]::HighQuality
    $g.PixelOffsetMode = [System.Drawing.Drawing2D.PixelOffsetMode]::HighQuality
    $g.DrawImage($img, 0, 0, $w, $h)

    $codec = [System.Drawing.Imaging.ImageCodecInfo]::GetImageEncoders() | Where-Object { $_.MimeType -eq 'image/jpeg' }
    $encoderParams = New-Object System.Drawing.Imaging.EncoderParameters(1)
    $encoderParams.Param[0] = New-Object System.Drawing.Imaging.EncoderParameter([System.Drawing.Imaging.Encoder]::Quality, [long]85)

    $target.Save((Join-Path (Get-Location) $destPath), $codec, $encoderParams)

    $g.Dispose()
    $target.Dispose()
    $img.Dispose()

    $fileInfo = Get-Item $destPath
    Write-Host "Success! Created $destPath with size: $($fileInfo.Length) bytes (original was 2.44 MB)"
} else {
    Write-Host "Source not found!"
}
