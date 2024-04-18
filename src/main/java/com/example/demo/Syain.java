package com.example.demo;

import jakarta.validation.constraints.Min;
import jakarta.validation.constraints.NotBlank;
import lombok.Data;

@Data
public class Syain {
	@NotBlank(message = "数値が未入力です。")
	@Min(1)
	private int syain_id;
	private String name;
	private int age;
	private String gender;
	private String birth;
	private String mail;
	private String department1;
	private String department2;
}
